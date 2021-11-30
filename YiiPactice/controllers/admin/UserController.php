<?php


namespace app\controllers\admin; //пространство имен

use app\controllers\AppController;
use yii\web\Controller; //импорт класса

//вложенный контроллер
class UserController extends AppController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
