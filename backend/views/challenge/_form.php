<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Challenge */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="challenge-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'value')->textInput() ?>

    <?= $form->field($model, 'category')->dropdownList([
            'web' => 'Web',
            'pwn' => 'Pwn',
            'reverse' => 'Reverse',
            'crypto' => 'Crypto',
            'misc' => 'Misc',
        ]) ?>

    <?= $form->field($model, 'dynamic')->radioList([
        1 => 'Active',
        0 => 'Inactive',
    ]) ?> 

    <?= $form->field($model, 'decrease')->textInput() ?>

    <?= $form->field($model, 'least')->textInput() ?>

    <?= $form->field($model, 'now')->textInput() ?>

    <?= $form->field($model, 'status')->radioList([
        1 => 'Active',
        0 => 'Inactive',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
