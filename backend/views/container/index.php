<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ContainerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Containers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Container', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Sync All Data', ['syncall'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            // 'container_hash',
            'container_name',
            // 'image_hash',
            'image_tag',
            [
                'label' => 'Created At',
                'attribute' => 'created',
                'value' => function($model){
                    return date('Y-m-d H:i:s', $model->created);
                },
            ],
            //'private_port',
            'public_port',
            //'ip_address',
            'state',
            'challenge_id',
            [
                'class' => ActionColumn::class,
                'template' => '{view} {delete}',
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
