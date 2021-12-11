<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Tour;
use yii\rest\ActiveController;

class StockController extends AppController
{
    public $modelClass = 'app\models\Stock';
}
