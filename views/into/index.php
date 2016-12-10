<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\User;

?>
    <h3>Вход в администпативную панель</h3>
    
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'rememberMe')->checkbox() ?>
        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    <?php ActiveForm::end(); ?>
