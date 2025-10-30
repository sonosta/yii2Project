<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin([
    'id' => 'form-author',
    'action' => ['create-author'],
    'enableAjaxValidation' => true,
]);

echo $form->field($model, 'name')->textInput();
echo $form->field($model, 'birth_date')->input('date');
echo $form->field($model, 'biography')->textarea();

echo Html::submitButton('Создать', ['class' => 'btn btn-primary']);

ActiveForm::end();