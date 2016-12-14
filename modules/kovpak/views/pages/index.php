<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Создать страницу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            [
                'attribute' => 'watch',
                'value' => function($data){
                    return !$data->watch ? '<span class="text-danger">Скрыт</span>' : '<span class="text-success">Показан</span>';
                },
                'format' => 'html'
            ],
            //'watch',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
