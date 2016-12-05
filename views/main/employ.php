<?php
use yii\helpers\Html;
?>

<div id="main-content" class="main-content">
    <h3><?=$employ[name]?></h3>
    <div>
    <p class="date">Дата выставления <?=formatDate($employ['date'])?></p>
    <p><?=$employ['text_desc']?></p>
    </div>
    <h4><?=Html::a('к списку вакансий','/employees')?></h4>
</div>