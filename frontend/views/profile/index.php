<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */

$this->title = 'My Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <br>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'email:email',
            [
                'label' => 'Created At',
                'value' => function($model){
                    return date('Y-m-d H:i:s', $model->created_at);
                },
            ],
            [
                'label' => 'Last Updated At',
                'value' => function($model){
                    return date('Y-m-d H:i:s', $model->updated_at);
                },
            ],
        ],
    ]) ?>

    <a href="<?= Yii::$app->urlManager->createUrl(['profile/email']) ?>" class="btn btn-primary">Update Email</a>

    <a href="<?= Yii::$app->urlManager->createUrl(['profile/password']) ?>" class="btn btn-primary">Update Password</a>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'challenge_id',
            'score',
        ],
    ]); ?>

</div>
