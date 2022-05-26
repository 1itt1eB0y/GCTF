<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Challenge */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="challenge-update">
    <div class="submit-form">

        <?php $form = ActiveForm::begin([
                'id' => 'challenge-form', 
                'options' => [
                    'class' => 'form-horizontal', 
                    'challenge_id' => $challenge_model['id']
                ],
                ]); ?>
        <?= $form  ->field($form_model, 'challenge_id', ['options'=>['style' => 'visibility:hidden;']])
                ->hiddenInput(['value' => $challenge_model['id']])
                ->label('')?>
        <h3>Flag</h3>
        <?= $form  ->field($form_model, 'flag')
                ->textInput([
                    'placeholder' => 'flag{xxx}', 
                    'class'=>'form-control', 
                    'style'=>'width:600px', 
                    'maxlength' => true
                ])
                ->label('',['style' => 'visibility:hidden;'])?>


        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
