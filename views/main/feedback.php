<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

?>

<div id="main-content" class="main-content">
    <h3>Форма обратной связи</h3>
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
    
    <p><i>* - поля, обязательные для заполнения</i></p>
    
    <?php $form = ActiveForm::begin(['options' => ['id' => 'feedback']]); ?>
        <?= $form->field($feedback, 'name')->textInput(['autofocus' => true]) ?>
        <?= $form->field($feedback, 'email') ?>    
        <?= $form->field($feedback, 'text')->textarea(['rows'=>5]) ?>
        <?= $form->field($feedback, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>     
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>       
    <?php ActiveForm::end(); ?>
</div>