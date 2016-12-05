<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\kovpak\models\Contact */

$this->title = 'Редактирование контакта ';
$this->params['breadcrumbs'][] = ['label' => 'Контакты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="contact-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
    <?= Html::a("Вернуться к списку","/kovpak/contact") ?>

</div>
