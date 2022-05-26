<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ChallengeFile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="challenge-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

        <?= $form->field($model, 'challengeFile')->fileInput()->label('Challenge File') ?>

        <div class="form-group">
            <?= Html::submitButton('UPLOAD', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end() ?>

</div>
