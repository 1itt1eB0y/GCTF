<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Challenge */

$this->title = 'Create Challenge';
$this->params['breadcrumbs'][] = ['label' => 'Challenges', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="challenge-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
