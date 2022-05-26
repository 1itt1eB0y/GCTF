<?php

namespace backend\controllers;

use backend\models\ContainerSearch;
use common\models\Container;
use Docker\Client\API\ContainerApi;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ContainerController implements the CRUD actions for Container model.
 */
class ContainerController extends Controller
{
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
                        'delete' => ['POST'],
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

    public function init()
    {
        parent::init();
    }
    /**
     * Lists all Container models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ContainerSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSyncall()
    {

        $containerDataRaw = (new ContainerApi())->containerList(true, 0, false, '{"network":["gctf_container"]}');
        if ($containerDataRaw == []) {
            Yii::$app->session->setFlash('success', 'No Container Found!');
            return $this->redirect(['index']);
        }
        foreach ($containerDataRaw as $container) {
            $containerData[] = [
                intval($container->getLabels()['user_id']),
                $container->getId(),
                $container->getNames()[0],
                $container->getImageId(),
                $container->getImage(),
                $container->getCreated(),
                $container->getPorts()[0]->getPrivatePort(),
                $container->getPorts()[0]->getPublicPort(),
                $container->getNetworkSettings()->getNetworks()['gctf_container']->getIpAddress(),
                $container->getState(),
                intval(($container->getLabels())['challenge_id']),
            ];
        }
        try {
            Yii::$app->db->createCommand()->delete('container')->execute();
            Yii::$app->db->createCommand()->batchInsert(
                'container',
                [
                    'user_id',
                    'container_hash',
                    'container_name',
                    'image_hash',
                    'image_tag',
                    'created',
                    'private_port',
                    'public_port',
                    'ip_address',
                    'state',
                    'challenge_id',
                ],
                $containerData
            )->execute();
            Yii::$app->session->setFlash('success', 'SYNC SUCCESSFUL');
        } catch (\Exception $e) {
            Yii::$app->session->setFlash('error', $e->getMessage());
        }

        return $this->redirect(['index']);
    }

    /**
     * Displays a single Container model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Container model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Container();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Container model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Container model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $container = Container::findOne([$id]) ?? null;
        if ($container) {
            try {
                (new ContainerApi())->containerDelete($container->container_hash, true, true);
                $container->delete();
                Yii::$app->session->setFlash('success', 'Container Database deleted!');
            } catch (\GuzzleHttp\Exception\ConnectException $e) {
                Yii::$app->session->setFlash('error', 'Container Connect Fatal Error!');
            } catch (\Exception $e) {
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        } else {
            Yii::$app->session->setFlash('error', 'Container not found in Database!');
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Container model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Container the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Container::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
