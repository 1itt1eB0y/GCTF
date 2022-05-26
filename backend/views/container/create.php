<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Container */

$this->title = 'Create Container';
$this->params['breadcrumbs'][] = ['label' => 'Containers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
