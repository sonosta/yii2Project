<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Авторы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <?php
        echo Html::a('Создать Автора', Url::to(['author/create']), [
            'class' => 'btn btn-success',
            'data-method' => 'post',
            'data-confirm' => 'Создать нового автора?'
        ]);
    ?>
</div>
