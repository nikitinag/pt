<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сообщения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'email:email',
            [
            'class' => 'yii\grid\DataColumn',
            'value' => function ($data) {
                return substr($data->text,0,20);
                },
            ],
            [
            'class' => 'yii\grid\DataColumn',
            'value' => function ($data) {
                return formatDate($data->date);
                },
            ],

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {delete}'],
        ],
    ]); ?>
<p>
    <?php if($dataProvider->getCount()>1): ?>
    <?= Html::a('Удалить все', ['/kovpak/message', 'delete' => 1], ['class' => 'end-link']) ?>
    <?php endif; ?>
</p>
</div>
