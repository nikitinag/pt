<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\UpdateForm;
use yii\bootstrap\ActiveForm;
?>

<div class="kovpak-index">
    <h2>Обновление ассортимента</h2>
    <? if(Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <? echo Yii::$app->session->getFlash('success') ?>
    </div>    
    <? endif; ?>
    <? if(Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <? echo Yii::$app->session->getFlash('error') ?>
    </div>
    <? endif; ?>
    <p class="dateupdate"><i>Дата последнего обновления: <?=formatDate($date)?></i></p>
    <p>Введите коэффициент.</p>
    <?php $form = ActiveForm::begin(['options' => ['class' => 'update']]); ?>
        <?= $form->field($model, 'coefficient')->textInput(['autofocus' => true]) ?>    
        <?= Html::submitButton('Обновить', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>
    <?php if($backup=='1'):?>
    <div class="backup">
        <a href="<?=Url::to('/kovpak?backup=down')?>"><button type="button" class="btn btn-default">Откатить назад</button></a>
        <a href="<?=Url::to('/kovpak?backup=up')?>"><button type="button" class="btn btn-default">Утвердить изменения</button></a>
    </div>
    <? endif; ?> 
</div>
