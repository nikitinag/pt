<?php

use yii\helpers\Html;

$this->title = 'Новый контакт';
$this->params['breadcrumbs'][] = ['label' => 'Контакты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
    <h4><?= Html::a('Вернуться к списку', '/kovpak/contact') ?></h4>

</div>
