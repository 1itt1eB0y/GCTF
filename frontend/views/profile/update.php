<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Update My Profile';
$this->params['breadcrumbs'][] = ['label' => 'Profile', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if($type == 'password'): ?>
        <?= $this->render('_password', [
            'model' => $model,
        ]) ?>
    <?php endif; ?>

    <?php if($type == 'email'): ?>
        <?= $this->render('_email', [
            'model' => $model,
        ]) ?>
    <?php endif; ?>

</div>
