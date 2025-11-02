<?php 

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use app\models\Book;
use app\models\Author;
use app\models\repAuthor;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;



class ReportController extends Controller
{
    public function actionContact()
    {
        // $searchModel = new repAuthor();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // return $this->render('index', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        // ]);
    }

}