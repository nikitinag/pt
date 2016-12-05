<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\kovpak\models\Contact */

$this->title = 'Новый контакт';
$this->params['breadcrumbs'][] = ['label' => 'Контакты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
