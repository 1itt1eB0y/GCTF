<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ContainerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'container_hash') ?>

    <?= $form->field($model, 'container_name') ?>

    <?= $form->field($model, 'image_hash') ?>

    <?php // echo $form->field($model, 'image_tag') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'private_port') ?>

    <?php // echo $form->field($model, 'public_port') ?>

    <?php // echo $form->field($model, 'ip_address') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'challenge_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
