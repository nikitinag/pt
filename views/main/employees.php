<?php
use yii\helpers\Html;

?>

<div id="main-content" class="main-content">
    <h3>Вакансии</h3>
    <p><?=$head?></p>
    <div class="employees">
        <? foreach($list as $employ): ?>
           <ul>
           <h4><?=$employ['name']?></h4>
           <p>Дата выставления <?=formatDate($employ['date'])?><span><?=Html::a("  Просмотреть...","/employees?id={$employ['id']}")?></span></p>
           </ul>
        <? endforeach; ?>
    </div>
</div>