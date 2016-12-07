<?php
use yii\helpers\Html;

?>

<div id="main-content" class="main-content">
    <h3>Вакансии</h3>
    <p><?=$head?></p>
    <div class="employees">
        <?php if($list): ?>
        <? foreach($list as $employ): ?>
           <ul>
           <h4><?=$employ['name']?></h4>
           <p><i>Дата выставления <?=formatDate($employ['date'])?></i><span><?= Html::a('просмотреть...', ['/employees', 'id' => $employ['id']]) ?></span></p>
           </ul>
        <? endforeach; ?>
        <?php endif; ?>
    </div>
</div>