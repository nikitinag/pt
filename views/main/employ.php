<?php
use yii\helpers\Html;
?>

<div id="main-content" class="main-content">
    <h3><?= $employ[name] ?></h3>
    <div>
    <p><i>Дата выставления <?= formatDate($employ['date']) ?></i></p>
    <p><?= $employ['text_desc'] ?></p>
    </div>
    <h4><?= Html::a('к списку вакансий', '/employees') ?></h4>
</div>

