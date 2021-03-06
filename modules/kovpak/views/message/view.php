<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Сообщение от '.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'Сообщения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Удалить это сообщение?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'name',
            'email:email',
            'text:ntext',
            [
                'class' => 'yii\grid\DataColumn',
                'value' => formatDate($model->date),
                'attribute' => 'Дата',
            ],
        ],
    ]) ?>
    
    <h4><?= Html::a('Вернуться к списку', '/kovpak/message') ?></h4>

</div>
