<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$form = ActiveForm::begin([
    'id' => 'form-book',
    'action' => ['create-book'],
    'enableAjaxValidation' => true,
    'validateOnBlur' => false,
    'validationUrl' => Url::to(['book/validate'])
]);

echo $form->field($model, 'title')->textInput();
echo $form->field($model, 'isbn')->textInput();
echo $form->field($model, 'author_id')->dropDownList($authors,['prompt' => 'Выберите автора']);
echo $form->field($model, 'publish_year')->input('int');
echo $form->field($model, 'description')->textarea();

echo Html::submitButton('Применить', ['class' => 'btn btn-primary']);

ActiveForm::end();