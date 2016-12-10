<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы хотите удалить эту вакансию?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'name',
            'text_desc:html',
            [
                'class' => 'yii\grid\DataColumn',
                'value' => formatDate($model->date),
                'attribute' => 'Дата',
            ],
            [
                'attribute' => 'watch',
                'value' => !$model->watch ? '<span class="text-danger">Скрыт</span>':'<span class="text-success">Показан</span>',
                'format' => 'html'
            ],
            //'watch',
        ],
    ]) ?>
    
    <h4><?= Html::a('Вернуться к списку', '/kovpak/employees') ?></h4>

</div>
