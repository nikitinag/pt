<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="contact-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->dropDownList([
        'телефон-факс' => 'телефон-факс',
        'мобильный телефон' => 'мобильный телефон',
        'эл.почта' => 'эл.почта',
        'адрес' => 'адрес',     
      ]) ?>
      
     <?= $form->field($model, 'contact')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
