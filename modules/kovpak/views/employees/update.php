<?php

use yii\helpers\Html;

$this->title = 'Редактирование вакансии: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employees-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
    <h4><?= Html::a('Вернуться к списку', '/kovpak/employees') ?></h4>

</div>
