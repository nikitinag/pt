<?php
use yii\helpers\Html;
use app\models\UpdateForm;
use yii\bootstrap\ActiveForm;
?>

<div class="kovpak-default-index">
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
    
    <p><i>Введите коэффициент с учётом курса валют и вашего дохода.</i></p>
    
    <?php $form = ActiveForm::begin(['options' => ['class' => 'update']]); ?>
        <?= $form->field($model, 'coefficient')->textInput(['autofocus' => true]) ?>    
        <?= Html::submitButton('Обновить', ['class' => 'btn btn-primary']) ?>    
    <?php ActiveForm::end(); ?>  
</div>
