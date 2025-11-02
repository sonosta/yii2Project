<?php 

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use app\models\Book;
use app\models\Author;
use yii\web\Response;
use yii\widgets\ActiveForm;


class BookController extends Controller
{
    public function actionCreateBook()
    {
        $model = new Book();
        $authors = ArrayHelper::map(Author::find()->all(), 'id', 'name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['site/index']);
        }

        return $this->renderAjax('_form_book', [
            'model' => $model,
            'authors' => $authors
        ]);
    }

    public function actionUpdateBook($id)
    {
        $model = new Book()::findOne($id);
        $authors = ArrayHelper::map(Author::find()->all(), 'id', 'name');

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['site/index']);
        // }

        return $this->renderAjax('_form_book', [
            'model' => $model,
            'authors' => $authors
        ]);
    }

    public function actionDelete($id)
    {
        $book = Book::findOne($id);
        if($book){
            $book->delete();
        }

        return $this->redirect(['site/index']);
    }

    public function actionValidate()
    {
        $model = new Book();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            
            return ActiveForm::validate($model);
        }
    }

}