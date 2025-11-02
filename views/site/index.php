<?php

/** @var yii\web\View $this */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\bootstrap5\Modal;
use yii\widgets\Pjax;


$this->title = 'Книги';

$script = <<< JS
    $('#modalButton').click(function() {
        $('#book-modal').modal('show')
            .find('#modalContent')
            .load('index.php?r=book/create-book');
    });

    $(document).on('click', '.btn-edit', function () {
        var id = $(this).data('id');
        var url = 'index.php?r=book/update-book&id=' + id;

        $('#book-modal').modal('show')
            .find('#modalContent')
            .load(url);
    });

    $(document).on('beforeSubmit', '#form-book', function(e) {

        var form = $(this);
        $.post(
            form.attr('action'),
            form.serialize()
        ).done(function(result) {
            if(result.success) {
                $('#book-modal').modal('hide');
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
<div class="site-index">

    <h1>
        Список книг
    </h1>
    <?php Pjax::begin();?>
    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'summary' => false,
            'columns' => [
                'id',
                'title',
                // 'author_id',
                [
                    'attribute' => 'author_id',
                    'label' => 'Автор',
                    'value' => function ($model) {
                        return $model->author ? $model->author->name : null;
                    },
                ],
                'publish_year',
                'isbn',
                'description',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' =>  Html::button('Создать книгу', ['class' => 'btn btn-success','id' => 'modalButton']),
                    'contentOptions' => ['class' => 'actions wo-after'],
                    'template' => '<div  data-grid-action-btn>
                                        <div class="d-flex gap-4 justify-content-between">{update}{delete}</div>
                                    </div>',
                    'options' => ['width' => '250'],
                    'buttons' => [
                        'delete' => function ($data, $modal) {
                            $url = Url::to(['book/delete', 'id' => $modal['id'], 'type' => 'delete']);

                            return Html::a(Html::button('Удалить', ['class' => 'btn btn-danger']), $url, [
                                'title' => 'Удалить',
                                'aria-label' => 'Удалить',
                                'data-method' => 'post',
                                'data-pjax' => '0',
                            ]);
                        },
                        'update' => function ($data , $model){
                            $url = Url::to(['book/update-book', 'id' => $model['id'], 'type' => 'delete']);
                            return Html::button('Редактировать', ['id' => 'modalUpdateButton','class' => 'btn btn-primary btn-edit','data-id' => $model->id]);
                        }
                    ],
                    'visibleButtons' => [
                        'delete' => function () {
                            return true;
                        },
                        'delete' => function () {
                            return true;
                        },
                    ]
                ],
            ]
        ]);
        Modal::begin([
            'id' => 'book-modal',
            'size' => Modal::SIZE_LARGE,
        ]);

        echo '<div id="modalContent"></div>';

        Modal::end();
    ?>
    <?php Pjax::end();?>
</div>
