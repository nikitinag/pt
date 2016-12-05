<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\kovpak\models\Employees */

$this->title = 'Создание вакансии';
$this->params['breadcrumbs'][] = ['label' => 'Вакансии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
