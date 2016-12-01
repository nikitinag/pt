<?php
use yii\helpers\Html;
use yii\db\Query;
use app\models\Data;
?>

<div id="main-content" class="main-content">
    <h3><?=$name?></h3>
    <p><i>Дата последнего обновления: <?=$date?></i></p>
    
    <div class="panel-group" id="accordion">
        <?php $i=0;foreach($categories as $category): ?>
        <?php $i++ ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$i?>">
                        <h4><?=$category->name?></h4>
                    </a>
                </h4>
            </div>
            <div id="collapse<?=$i?>" class="panel-collapse collapse">
                <div class="panel-body">
                <table class="table table-striped table-condensed">
                    <tr><th><?=$category->item1?></th><th><?=$category->item2?></th><th><?=$category->type?></th><th><?=$category->price?></th></tr>
                        <?php foreach(Data::find()->where(['category_id' => $category->id])->asArray()->each(10) as $data): ?>
                            <tr><td><?=$data['item1']?></td><td><?=$data['item2']?><td><?=$data['type']?><td><?=$data['price']?></td></tr>
                        <?php endforeach; ?>
                </table>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <p><i>Дата последнего обновления: <?=$date?></i></p>
</div>