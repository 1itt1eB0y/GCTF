<?php

namespace backend\controllers;

use backend\models\ChallengeFile;
use backend\models\ChallengeSearch;
use common\models\Challenge;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * ChallengeController implements the CRUD actions for Challenge model.
 */
class ChallengeController extends Controller
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
     * Lists all Challenge models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ChallengeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUpload($id)
    {
        $challenge = $this->findModel($id);
        $file = new ChallengeFile();
        $file->challengeID = $id;
        if ($this->request->isPost) {
            $file->challengeFile = UploadedFile::getInstance($file, 'challengeFile');
            if ($file->upload()) {
                if (file_exists(Yii::getAlias('@files') . '/' . $challenge->file)
                    && $file->saveName != $challenge->file
                    && !FileHelper::unlink(Yii::getAlias('@files') . '/' . $challenge->file)) {
                    Yii::$app->session->setFlash('warning', 'Old File can\'t be deleted! Delete it by yourself: ' . $challenge->file);
                }
                $challenge->file = $file->saveName;
                if ($challenge->save()) {
                    Yii::$app->session->setFlash('success', 'File Uploaded for Challenge ' . $id . ' Seccessfully! File: ' . $file->saveName);
                } else {
                    Yii::$app->session->setFlash('error', 'Database Update Failed for Challenge ' . $id . '! Please Re-try!');
                    FileHelper::unlink('@files' . $challenge->file);
                }
                return $this->redirect(['view', 'id' => $id]);
            } else {
                Yii::$app->session->setFlash('error', 'File Uploaded for Challenge ' . $id . ' Failed!');
            }
        }

        return $this->render('upload', [
            'file' => $file,
            'model' => $challenge,
        ]);
    }

    /**
     * Creates a new Challenge model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Challenge();

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
     * Updates an existing Challenge model.
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
     * Deletes an existing Challenge model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
