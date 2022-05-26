<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TrackingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trackings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tracking-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type',
            'ip',
            'user_id',
            'date'
        ],
        'pager' => [
            'options' => [
                'style' => 'font-size:20px;display:ruby;padding-left:0;list-style:none;border-radius:.25rem',
            ],
        ],
    ]); ?>


</div>
