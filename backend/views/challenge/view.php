<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Challenge */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Challenges', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="challenge-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Upload File', ['upload', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description:ntext',
            'value',
            'category',
            'file',
            [
                'label' => 'Dynamic',
                'value' => function ($model) {
                    return $model->getDynamic() ? 'Acitve(1)' : 'Inactive(0)';
                },
            ],
            'decrease',
            'least',
            'now',
            [
                'label' => 'Status',
                'value' => function ($model) {
                    return $model->getStatus() ? 'Acitve(1)' : 'Inactive(0)';
                },
            ],
        ],
    ]) ?>

</div>
