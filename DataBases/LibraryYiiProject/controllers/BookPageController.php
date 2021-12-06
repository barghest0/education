<?php

namespace app\controllers;

use Yii;
use app\models\Genre;
use app\models\GenreSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Book;
/**
 * GenreController implements the CRUD actions for Genre model.
 */
class BookPageController extends Controller
{

    public function actionIndex(){
        $model = new Book();
        $books = $model->find()->all();
        return $this->render('index',['books'=>$books]);
    }
}