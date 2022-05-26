<?php

namespace frontend\controllers;

use common\models\Container;
use common\models\Image;
use Docker\Client\API\ContainerApi;
use Docker\Client\Api\ImageApi;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;

class ContainerController extends Controller
{
    protected $containerApi;
    protected $imageApi;
    protected $containerTable;
    protected $user_id;

    public function init()
    {
        parent::init();

        $this->containerApi = new ContainerApi();
        $this->imageApi = new ImageApi();
        $this->containerTable = new Container();
        $this->user_id = Yii::$app->user->id;
    }

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['DELETE'],
                        'submit' => ['POST'],
                    ],
                ],
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
            ]
        );
    }

    protected function containerValid($container)
    {
        try {
            $this->containerApi->containerInspect($container->container_hash);
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    public function actionDelete()
    {
        $container = $this->containerTable->findOne(['user_id' => $this->user_id]) ?? null;
        if ($container) {
            try {
                $this->containerApi->containerDelete($container->container_hash, true, true);
            } catch (\GuzzleHttp\Exception\ConnectException $e) {
                return $this->asJson([
                    'state' => 'error',
                    'message' => 'Container Connect Fatal Error! Contact Admin!',
                ]);
            } catch (\Exception $e) {
                return $this->asJson(['state' => 'error', 'message' => $e->getMessage()]);
            }
            $container->delete();
            return $this->asJson(['state' => 'success', 'message' => 'Container deleted!']);
        }
        return $this->asJson(['state' => 'error', 'message' => 'Container not found in Database! Contact Admin!']);
    }

    protected function syncData($user_id = null)
    {
        if ($user_id === null) {
            $user_id = $this->user_id;
        }
        $container = new Container();
        $containerDataRaw = $this->containerApi->containerList(true, 0, false, '{"label":["user_id=' . $user_id . '"]}');
        $containerData = $containerDataRaw[0];

        $container->user_id = $user_id;
        $container->container_hash = $containerData->getId();
        $container->container_name = $containerData->getNames()[0];
        $container->image_hash = $containerData->getImageId();
        $container->image_tag = $containerData->getImage();
        $container->created = $containerData->getCreated();
        $container->private_port = $containerData->getPorts()[0]->getPrivatePort();
        $container->public_port = $containerData->getPorts()[0]->getPublicPort();
        $container->ip_address = $containerData->getNetworkSettings()->getNetworks()['gctf_container']->getIpAddress();
        $container->state = $containerData->getState();
        $container->challenge_id = intval(($containerData->getLabels())['challenge_id']);
        return $container->save();
    }

    public function syncOne($challenge_id)
    {
        $containerDataRaw = [];
        $container = $this->containerTable->findOne(['challenge_id' => $challenge_id, 'user_id' => $this->user_id]) ?? null;
        if ($container) {
            $containerDataRaw = $this->containerApi->containerList(true, 0, false, '{"id":["' . $container->container_hash . '"]}');
            if ($containerDataRaw == []) {
                $container->delete();
                $this->createContainer($challenge_id);
            }
        } else {
            $containerDataRaw = $this->containerApi->containerList(true, 0, false, '{"label":["user_id=' . $this->user_id . '"]}');
            if ($containerDataRaw == []) {
                $image = (new Image())->findOne(['challenge_id' => $challenge_id]) ?? null;
                if ($image) {
                    $this->createContainer($challenge_id);
                } else {
                    throw new \Exception('Container not found in Database! Contact Admin!');
                }
            }
        }
        $this->syncData();
        return true;
    }

    public function createContainer($challenge_id)
    {
        $image = (new Image())->findOne(['challenge_id' => $challenge_id]) ?? null;
        if ($image == null) {
            throw new \ErrorException('Image not found! Contact Admin!');
        }
        $createData = [
            'Image' => $image->tag,
            'HostConfig' => [
                'PublishAllPorts' => true,
            ],
            'Labels' => [
                'user_id' => strval($this->user_id),
                'challenge_id' => strval($challenge_id),
            ],
            'NetworkingConfig' => [
                'EndpointsConfig' => [
                    'gctf_container' => [
                        'Aliases' => [
                            'USER_' . $this->user_id . '_CHALLENGE_' . $challenge_id,
                        ],
                    ],
                ],
            ],
        ];
        try {
            $res = $this->containerApi->containerCreate(json_encode($createData), 'USER_' . $this->user_id . '_CHALLENGE_' . $challenge_id);
            $this->containerApi->containerStart($res->getId());
        } catch (\Exception $e) {
            error_log($e->getMessage());
            throw $e;
        }
    }

    public function actionAddress($challenge_id, $create = false)
    {
        $container = $this->containerTable->findOne(['user_id' => $this->user_id]) ?? null;
        try {
            if ($container) {
                if (!$this->containerApi->containerList(true, 0, false, '{"label":["user_id=' . $this->user_id . '"]}')) {
                    $this->syncOne($challenge_id);
                }
                if ($container->challenge_id == $challenge_id) {
                    return $this->asJson([
                        'state' => 'success',
                        'message' => Yii::$app->params['dockerPublicURL'] . ':' . $container->public_port,
                    ]);
                } else {
                    return $this->asJson([
                        'state' => 'warning',
                        'message' => 'You have been created a container for ' . $container->challenge_id . ', please destroy it first.',
                    ]);
                }
            } else if ($create) {
                $this->syncOne($challenge_id);
                $container = $this->containerTable->findOne(['user_id' => $this->user_id]);
                return $this->asJson([
                    'state' => 'success',
                    'message' => Yii::$app->params['dockerPublicURL'] . ':' . $container->public_port,
                ]);
            } else {
                return $this->asJson([
                    'state' => 'success',
                    'message' => 'You have not created a container yet.',
                    'free' => true,
                ]);}
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            return $this->asJson([
                'state' => 'error',
                'message' => 'Container Connect Fatal Error! Contact Admin!',
            ]);
        } catch (\Exception $e) {
            return $this->asJson([
                'state' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

}
