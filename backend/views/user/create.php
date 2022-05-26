<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <h3 style="color:red;">NOTICE: Password can't modified by Admin!</h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
