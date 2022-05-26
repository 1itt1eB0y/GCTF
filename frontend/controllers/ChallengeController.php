<?php

namespace frontend\controllers;

use common\models\Challenge;
use common\models\FlagForm;
use common\models\Solve;
use common\models\Image;
use Yii;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\BadRequestHttpException;

/**
 * ChallengeController implements the CRUD actions for Challenge model.
 */
class ChallengeController extends Controller
{
    public function init()
    {
        parent::init();
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
                    ],
                ],
                'access' => [
                    'class' => AccessControl::class,
                    'only' => ['view', 'file'],
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
            ],
        );
    }

    /**
     * Lists all Challenge models.
     *
     * @return string
     */
    public function actionIndex($type = null)
    {
        if(!in_array($type, ['web', 'pwn', 'misc', 're', 'crypto']))
        {
            throw new BadRequestHttpException('Invalid type');
        }
        
        $query = Challenge::find();

        $pagination = new Pagination([
            'defaultPageSize' => 15,
            'totalCount' => $query->where(['category' => $type])->count(),
        ]);

        if ($type) {
            $challenges = $query->orderBy('id')
                ->where(['category' => $type, 'status' => Challenge::STATUS_ACTIVE])
                ->asArray()
                ->all();
        } else {
            return $this->goHome();
        }
        if (!Yii::$app->user->isGuest) {
            $solves_obj = Solve::find()
                ->select('challenge_id')
                ->where(['user_id' => Yii::$app->user->identity->id])
                ->asArray()
                ->all() ?? [];
            foreach ($solves_obj as $solve) {
                $solves[] = $solve['challenge_id'];
            }
        }

        return $this->render('index', [
            'type' => $type,
            'challenges' => $challenges,
            'solves' => $solves ?? [],
            'pagination' => $pagination,
        ]);
    }

    /**
     * Displays a single Challenge model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $form_model = new FlagForm();
        $image_model = (new Image())->find()->where(['challenge_id' => $id])->one() ?? [];
        $challenge_model = $this->findModel($id);
        if($image_model != []) {
            $challenge_model->setAttribute('category', 1);
        }else{
            $challenge_model->setAttribute('category', 0);
        }
        if ($this->request->isPost && $form_model->load($this->request->post())) {
            if ($form_model->submit()){
                Yii::$app->session->setFlash('success', '√ Congratulations! You solved the challenge!');
            } else {
                Yii::$app->session->setFlash('error', 'Wrong Flag.');
            }
            return $this->redirect('/challenge/' . $id);
        }
        // $this->debug($challenge_model);
        // $this->debug($image_model !== []);
        return $this->render('view', [
            'form_model' => $form_model,
            'challenge_model' => $challenge_model,
        ]);
    }

    public function actionFile($file)
    {
        if (!$file) {
            throw new BadRequestHttpException('File is NULL');
        }
        try {
            return Yii::$app->response->sendFile(Yii::getAlias(Yii::$app->params['filePath'] . $file));
        }catch (\Exception $e) {
            throw new NotFoundHttpException('File not found');
        }
    }

    /**
     * Finds the Challenge model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Challenge the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Challenge::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
