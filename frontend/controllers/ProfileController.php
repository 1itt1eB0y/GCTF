<?php

namespace frontend\controllers;

use common\models\Solve;
use common\models\User;
use frontend\models\UpdatePasswordForm;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ArrayDataProvider;

/**
 * ProfileController implements the CRUD actions for User model.
 */
class ProfileController extends Controller
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
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $user = User::findOne(['id' => \Yii::$app->user->id]);
        $dataArray = Solve::find()
            ->select(['challenge_id','score'])
            ->where(['user_id' => \Yii::$app->user->id])
            ->asArray()
            ->all();
        $dataProvider = new ArrayDataProvider(
            [
                'allModels' => $dataArray,
            ]
        );
        return $this->render('index', [
            'model' => $user,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($type)
    {
        if ($type == 'password') {
            $model = new UpdatePasswordForm();
            if ($this->request->isPost && $model->load($this->request->post()) && $model->validate()) {
                $model->resetPassword();
                \Yii::$app->session->setFlash('success', 'Password has been changed.');
                return $this->redirect('/login');
            }
        } else if ($type == 'email') {
            $model = $this->findModel(\Yii::$app->user->id);
            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }
        } else {
            throw new NotFoundHttpException('Not Found');
        }

        return $this->render('update', [
            'model' => $model,
            'type' => $type,
        ]);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
