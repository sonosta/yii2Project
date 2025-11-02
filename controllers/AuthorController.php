<?php 

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Author;
use yii\web\Response;
use yii\widgets\ActiveForm;


class AuthorController extends Controller
{

    public function actionCreateAuthor()
    {
        $model = new Author();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['site/about']);
        }

        return $this->renderAjax('_form_author', ['model' => $model]);
    }

    public function actionUpdateAuthor($id)
    {
        $model = new Author()::findOne($id);

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['site/about']);
        // }

        return $this->renderAjax('_form_author', [
            'model' => $model
        ]);
    }

    public function actionDelete($id)
    {
        $author = Author::findOne($id);
        if($author){
            $author->delete();
        }

        return $this->redirect(['site/about']);
    }

    public function actionValidate()
    {
        $model = new Author();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            
            return ActiveForm::validate($model);
        }
    }
}