<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\kovpak\models\Contact */

$this->title = 'Новый контакт';
$this->params['breadcrumbs'][] = ['label' => 'Контакты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
