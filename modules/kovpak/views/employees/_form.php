<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\modules\kovpak\models\Employees */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employees-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?=$form->field($model, 'text_desc')->widget(CKEditor::className(),[
        'editorOptions' => [
        'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
        'inline' => false, //по умолчанию false
        ],
    ]) ?>
    <?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), [ 'dateFormat' => 'yyyy-MM-dd',]) ?>
    <?= $form->field($model, 'watch')->dropDownList([ '1' => 'Показать', '0' => 'Скрыть', ]) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
