<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ChallengeFile */

$this->title = 'File for Challenge: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Challenges', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Upload File';
?>
<div class="challenge-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <?= $this->render('_upload', [
        'model' => $file,
    ]) ?>

</div>


