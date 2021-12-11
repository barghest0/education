<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use yii\rest\ActiveController;

use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;

class UserController extends AppController 
{

    public $modelClass = 'app\models\User';
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::class,
            'except' => ['create','login'],
            'authMethods' => [
                HttpBearerAuth::class,
            ],
        ];
        return $behaviors;
    }



    public function actionLogin()
    {
        $params = Yii::$app->request->post();
        $user = User::find()->where(['phone' => $params['phone'], 'password' => $params['password']])->one();
        if ($user) {
            $response['token']=$user->id;
            return json_encode($response);
        }else{
            $response = ['message'=>'Пользователь не найден'];
            return json_encode($response);

        }
    }
}
