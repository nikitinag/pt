<?php
    
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\User;

?>
    <h2>Замена логина и пароля</h2>
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
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'newusername')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'newpassword1')->passwordInput() ?>
        <?= $form->field($model, 'newpassword2')->passwordInput() ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= Html::submitButton('Изменить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    <?php ActiveForm::end(); ?>