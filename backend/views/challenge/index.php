<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ChallengeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Challenges';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="challenge-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Challenge', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            // 'description:ntext',
            'value',
            'now',
            'category',
            'file:ntext',
            //'dynamic',
            //'decrease',
            //'least',
            [
                'label' => 'Status',
                'attribute' => 'status',
                'value' => function ($model) {
                    return $model->getStatus() ? 'Acitve(1)' : 'Inactive(0)';
                },
            ],
            [
                'class' => ActionColumn::class,
                'template' => '{upload} {view} {update} {delete}',
                'buttons' => [
                    'upload' => function ($url, $model, $key) {
                          return  Html::a('<svg version="1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="18" height="16" enable-background="new 0 0 48 48">
                          <polygon fill="#007bff" points="40,45 8,45 8,3 30,3 40,13"/>
                          <polygon fill="#E1F5FE" points="38.5,14 29,14 29,4.5"/>
                      </svg>', $url, ['title' => 'Upload File'] ) ;
                         },
                    ],
                ],
            ],
        'pager' => [
            'options' => [
                'style' => 'font-size:20px;display:ruby;padding-left:0;list-style:none;border-radius:.25rem',
            ],
        ],
    ]); ?>


</div>
