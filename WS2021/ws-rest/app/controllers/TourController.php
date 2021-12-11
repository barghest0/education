<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\rest\ActiveController;
use yii\helpers\Url;
use app\models\Tour;

class TourController extends AppController
{

    public $modelClass = 'app\models\Tour';


    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex()
    {
        $q = Yii::$app->request->get('query');
        if ($q) {
            return Tour::find()->where(['like', 'name', $q])->all();
        } else {
            return Tour::find()->all();
        }
    }

    public function actionRandom()
    {
        $last = explode("/", $_SERVER['REQUEST_URI']);
        return Tour::find()->orderBy('rand()')->limit(end($last))->all();
    }

    public function actionSearch()
    {
        $search = explode("/", $_SERVER['REQUEST_URI']);
        return Tour::find()->where(['like', 'slug', end($search)])->all();
    }




}
