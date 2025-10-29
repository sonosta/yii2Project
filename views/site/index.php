<?php

/** @var yii\web\View $this */
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Книги';?>
<div class="site-index">

    <h1>
        Список книг
    </h1>
    <table>
        <thead>
            <tr>
                <th>Фото</th>
                <th>Название</th>
                <th>ISBN</th>
                <th>Год выпуска</th>
                <th>Описание</th>
                <th>
                    <?php
                        echo Html::a('Создать книгу', Url::to(['book/create']), [
                            'class' => 'btn btn-success',
                            'data-method' => 'post',
                            'data-confirm' => 'Создать новую книгу?'
                        ]);
                    ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="5">Ничего не найдено</td>
            </tr>
        </tbody>
    </table>
</div>
