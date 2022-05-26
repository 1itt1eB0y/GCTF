<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput([
        'maxlength' => true, 
        ]) ?>

    <?= $form->field($model, 'email')->textInput([
        'maxlength' => true, 
        ]) ?>

    <?= $form->field($model, 'status')->radioList([
        11 => 'Admin',
        10 => 'Active',
        9 => 'Inactive',
        1 => 'Banned',
        0 => 'Deleted',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
