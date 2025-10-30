<?php

/** @var yii\web\View $this */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;


$this->title = 'Книги';?>
<div class="site-index">

    <h1>
        Список книг
    </h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'tableOptions' => ['id' => 'exception', 'class' => 'table mt-hover table-exception main-tpl rounded'],
        'options' => ['class' => 'exception'],
        'columns' => [
            'id',
            'title',
            'author_id',
            'publish_year',
            'isbn',
            'description',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => Html::a('Создать книгу', Url::to(['book/create']), ['class' => 'btn btn-success']),
                'contentOptions' => ['class' => 'actions wo-after'],
                'template' => '<div class="d-flex" data-grid-action-btn>
                                    <div>{confirm}</div>
                                </div>',
                'options' => ['width' => '50'],
                'buttons' => [
                    'confirm' => function ($data) {
                        // return Html::a(Yii::t('app', 'Подтвердить'), 'author/create', ['title' => \Yii::t('app', 'Подтвердить'), 'class' => 'btn btn-success', 'data-pjax' => 0]);
                    }
                ],
                'visibleButtons' => [
                    'confirm' => function () {
                        // return ($model->showBtns() === true and $model->showBtnsAppealReject() === true);
                        return true;
                    }
                ]
            ],
        ]
    ]);
    ?>
</div>
