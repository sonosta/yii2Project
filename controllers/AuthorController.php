<?php 

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Author;
use yii\web\Response;

class AuthorController extends Controller
{
    public function actionCreate()
    {
        $author = new Author();
        $author->name = 'Иван Иванов';
        $author->birth_date = '1980-01-01';
        $author->biography = 'Биография автора...';

        if ($author->save()) {
            return 'Автор успешно создан';
        } else {
            return 'Ошибка создания автора: ' . json_encode($author->errors);
        }
    }
}