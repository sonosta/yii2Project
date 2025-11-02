<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

use yii\grid\GridView;
use yii\widgets\Pjax;


$this->title = 'Отчет';
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'method' => 'get',
        'action' => ['index'],
    ]); ?>

    <?= $form->field($searchModel, 'name') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php Pjax::begin();?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => false,
                'columns' => [
                    'id',
                    'name',
                    'birth_date',
                    'biography',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => Html::button('Создать автора', ['class' => 'btn btn-success','id' => 'modalButton']),
                        'contentOptions' => ['class' => 'actions wo-after'],
                        'options' => ['width' => '50'],
                        'visibleButtons' => [
                            'delete' => true,
                            'update' => true
                        ]
                    ]
                ]
            ]);
            ?>
        <?php Pjax::end();?>
</div>
