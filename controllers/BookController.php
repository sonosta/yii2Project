<?php 

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Book;
use yii\web\Response;

class BookController extends Controller
{
    public function actionCreate()
    {
        $book = new Book();
        $book->title = 'Новая Книга';
        $book->author_id = 1;           // указать существующего автора
        $book->publish_year = 2025;
        $book->isbn = '1234567890';
        $book->description = 'Описание книги';

        if ($book->save()) {
            return 'Книга успешно создана';
        } else {
            return 'Ошибка создания книги';
        }
    }
}