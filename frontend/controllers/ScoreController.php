<?php

namespace frontend\controllers;

use common\models\Solve;
use common\models\User;
use yii\data\ArrayDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ScoreController implements the CRUD actions for Solve model.
 */
class ScoreController extends Controller
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
            ]
        );
    }

    /**
     * List SocreBoard
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataArray = Solve::find()->asArray()->all();
        $scores = [];
        foreach ($dataArray as $data) {
            if (isset($scores[$data['user_id']])) {
                $scores[$data['user_id']][1] += $data['score'];
            } else {
                $scores[$data['user_id']] = [
                    $data['user_id'],
                    $data['score'],
                ];
            }
        }
        $dataArray = [];
        foreach ($scores as $score) {
            $dataArray[] = [
                'user' => User::find()->select('username')->where(['id' => $score[0]])->one()->username,
                'score' => $score[1],
            ];
        }
        $dataProvider = new ArrayDataProvider(
            [
                'allModels' => $dataArray,
                'sort' => [
                    'attributes' => ['user', 'score'],
                    'defaultOrder' => [
                        'score' => SORT_DESC,
                        'user' => SORT_ASC,
                    ],
                ],
            ]
        );

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the Solve model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Solve the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Solve::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
