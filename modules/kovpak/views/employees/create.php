<?php

use yii\helpers\Html;

$this->title = 'Создание вакансии';
$this->params['breadcrumbs'][] = ['label' => 'Вакансии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
    <h4><?= Html::a('Вернуться к списку', '/kovpak/employees') ?></h4>

</div>
