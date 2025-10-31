<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\bootstrap5\Modal;
use yii\widgets\Pjax;

$this->title = 'Авторы';

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
        })
        return false;
    });
JS;
$this->registerJs($script);
?>
    <h1>
        Авторы
    </h1>
    <div class="site-about">
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
                        'template' => '{delete}',
                        'options' => ['width' => '50'],
                        'buttons' => [
                            'delete' => function ($data,$modal) {

                                $url = Url::to(['author/delete', 'id' => $modal['id'], 'type' => 'delete']);

                                return Html::a(Html::button('Удалить', ['class' => 'btn btn-success']), $url, [
                                    'title' => 'Удалить',
                                    'aria-label' => 'Удалить',
                                    'data-method' => 'post',
                                    'data-pjax' => '0',
                                ]);
                            }
                        ],
                        'visibleButtons' => [
                            'delete' => true
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
        <?php Pjax::end();?>
    </div>