<?php
use yii\helpers\Html;
use yii\db\Query;
use app\models\Data;
?>

<div id="main-content" class="main-content">
    <h3><?=$name?></h3>
    <p>Дата последнего обновления: <?=$date?></p>
    
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
                    <p><b><?=$category->item1?></b>   <i><?=$category->item2?></i>   <b><?=$category->type?></b>   <i><?=$category->price?></i></p>
                    <div>
                        <?php foreach(Data::find()->where(['category_id' => $category->id])->asArray()->each(10) as $data): ?>
                            <p><?=$data['item1']?>   <?=$data['item2']?>   <?=$data['type']?>   <?=$data['price']?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>