<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Challenge';
$this->params['breadcrumbs'][] = $this->title;
AppAsset::addCss($this, '@web/css/challenge-board.min.css');
?>
<div class="challenge-index">

    <h1>
        <?=Html::encode($type)?>
    </h1>

    <br><br>
    <div class="category-challenges col-md-12">
        <div class="challenges-row col-md-12">
            <?php foreach ($challenges as $challenge): ?>
                <?=Html::beginTag('div', ['class' => ['col-md-3','d-inline-block'], 'id' => $challenge['id']])?>
                    <?php if (in_array($challenge['id'], $solves)): ?> 
                        <?= Html::a("<p>{$challenge['id']} {$challenge['name']}</p><span>Score: {$challenge['now']}</span>",
                        ['challenge/view', 'id' => $challenge['id']],
                        ['class'=>"submit btn btn-dark challenge-button w-100 text-truncate pt-3 pb-3 mb-5 solved-challenge"]) ?>
                    <?php else: ?>
                        <?= Html::a("<p>{$challenge['id']} {$challenge['name']}</p><span>Score: {$challenge['now']}</span>",
                        ['challenge/view', 'id' => $challenge['id']],
                        ['class'=>"submit btn btn-dark challenge-button w-100 text-truncate pt-3 pb-3 mb-5"]) ?>
                    <?php endif; ?>
            <?=Html::endTag('div')?>
            <?php endforeach;?>
        </div>
    </div>
    
    <!-- <?=LinkPager::widget([
        'pagination' => $pagination,
        'options' => [
            'style' => 'font-size:20px;display:ruby;padding-left:0;list-style:none;border-radius:.25rem',
        ],
        ])?> -->

</div>