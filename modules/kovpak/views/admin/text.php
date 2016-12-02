<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
?>

<div class="kovpak-default-index">
    <h2>Обновление текста на главной странице</h2>
    
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
    <div class="info-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'text_above')->textarea() ?>
    <?= $form->field($model, 'text')->widget(CKEditor::className(),[
        'editorOptions' => [
        'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
        'inline' => false, //по умолчанию false
        ],
    ]) ?>
    <?= $form->field($model, 'keywords')->textarea() ?>
    <?= $form->field($model, 'description')->textarea() ?>
    
    <div class="form-group">
        <?= Html::submitButton('Изменить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>
</div>