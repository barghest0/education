<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class AppController extends Controller
{
    //protected метод для регистрации метатегов и заголовка
    protected function setMeta($title = null, $keywords = null, $description = null)
    {
        $this->view->title = $title;

        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $keywords]);

        $this->view->registerMetaTag(['name' => 'description', 'content' => $description]);
    }
}
