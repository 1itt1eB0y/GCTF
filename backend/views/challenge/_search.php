<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ChallengeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="challenge-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'value') ?>

    <?= $form->field($model, 'category') ?>

    <?php // echo $form->field($model, 'file') ?>

    <?php // echo $form->field($model, 'dynamic') ?>

    <?php // echo $form->field($model, 'decrease') ?>

    <?php // echo $form->field($model, 'least') ?>

    <?php // echo $form->field($model, 'now') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
