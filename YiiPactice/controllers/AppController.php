<?php


namespace app\controllers; //пространство имен

use yii\web\Controller; //импорт класса

class AppController extends Controller
{

    protected function debug($arr) //создаем метода для дебага
    {
        echo '<pre>' . print_r($arr, true) . '</pre>';
    }
}
