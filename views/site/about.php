<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\bootstrap5\Modal;

$this->title = 'Авторы';
$this->params['breadcrumbs'][] = $this->title;

$script = <<< JS
    $('#modalButton').click(function() {
        $('#author-modal').modal('show')
            .find('#modalContent')
            .load('index.php?r=author/create-author');
    });

    $(document).on('beforeSubmit', '#form-author', function(e) {
        var form = $(this);
        $.post(
            form.attr('action'),
            form.serialize()
        ).done(function(result) {
            if(result.success) {
                $('#author-modal').modal('hide');
                location.reload();
            } else {
                form.yiiActiveForm('updateMessages', result.errors, true);
            }
        }).fail(function() {
            alert('Ошибка сервера');
        });
        return false;
    });
JS;
$this->registerJs($script);
?>
    <h1>
        Авторы
    </h1>
<div class="site-about">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'tableOptions' => ['id' => 'exception', 'class' => 'table mt-hover table-exception main-tpl rounded'],
        'options' => ['class' => 'exception'],
        'columns' => [
            'id',
            'name',
            'birth_date',
            'biography',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => Html::button('Создать автора', ['class' => 'btn btn-success','id' => 'modalButton',]),
                'contentOptions' => ['class' => 'actions wo-after'],
                'template' => '<div class="d-flex" data-grid-action-btn>
                                    <div>{confirm}</div>
                                </div>',
                'options' => ['width' => '50'],
                'buttons' => [
                    'confirm' => function ($data) {
                        // return Html::a(Yii::t('app', 'Редактировать'), 'author/create', ['title' => \Yii::t('app', 'Редактировать'), 'class' => 'btn btn-success', 'data-pjax' => 0]);
                    }
                ],
                'visibleButtons' => [
                    'confirm' => function () {
                        // return ($model->showBtns() === true and $model->showBtnsAppealReject() === true);
                        return true;
                    }
                ]
            ]
        ]
    ]);
    Modal::begin([
        'id' => 'author-modal',
        'size' => Modal::SIZE_LARGE,
    ]);

    echo '<div id="modalContent"></div>';

    Modal::end();
?>
</div>
