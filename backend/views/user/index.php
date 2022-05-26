<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            'email:email',
            'status',
            [
                'label' => 'Created At',
                'attribute' => 'created_at',
                'value' => function($model){
                    return date('Y-m-d H:i:s', $model->created_at);
                },
            ],
            [
                'label' => 'Updated At',
                'attribute' => 'updated_at',
                'value' => function($model){
                    return date('Y-m-d H:i:s', $model->updated_at);
                },
            ],
            //'verification_token',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
        'pager' => [
            'options' => [
                'style' => 'font-size:20px;display:ruby;padding-left:0;list-style:none;border-radius:.25rem',
            ],
        ],
    ]); ?>


</div>
