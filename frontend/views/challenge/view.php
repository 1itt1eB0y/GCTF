<?php

use frontend\assets\AppAsset;
use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $challenge_model common\models\Challenge */
/* @var $form_model common\models\Flag */

$this->title = $challenge_model->name;
$this->params['breadcrumbs'][] = ['label' => 'Challenges', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
AppAsset::addJs($this, '@web/js/challenge-action.js');
?>

<div class="challenge-view">
    
    <h1><?= Html::encode($this->title) ?></h1>


    <?= $this->render('_form', [
        'form_model' => $form_model,
        'challenge_model' => $challenge_model,
    ]) ?>

    <br>
    <?= DetailView::widget([
        'model' => $challenge_model,
        'attributes' => [
            'description:ntext',
            'now:integer:Current Score',
            [
                'label' => 'Container',
                'format' => 'raw',
                'value' => function($challenge_model){
                    if ($challenge_model['category'] == 1) {
                        return '<a id="create" class="btn btn-success" onclick="CreateContainer('.$challenge_model['id'].')">Loading...</a>  '.
                        '<button id="delete" class="btn btn-danger"  onclick="DeleteContainer('.$challenge_model['id'].')">Delete Container</button>'
                        ;
                    } else {
                        return 'Not Supported';
                    }
                },
            ],
            [
                'label' => 'File',
                'format' => 'html',
                'value' => function($challenge_model){
                    if ($challenge_model['file']) {
                        return '<a class="btn btn-dark" href="/file/'.$challenge_model['file'].'">'.$challenge_model['file'].'</a>';
                    } else {
                        return 'No File';
                    }
                },
            ],
        ],
    ]) ?>
</div>