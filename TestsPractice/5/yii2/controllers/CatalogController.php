<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use app\models\Product;


class CatalogController extends Controller
{
 

    public function actionIndex()
    {
        $q = trim(Yii::$app->request->get('query'));
        if($q){
            return $this->render('index',['products'=>Product::search($q)]);
        }
        return $this->render('index',['products'=>Product::findAll()]);
    }


    public function actionSingle($id)
    {
        if (!Yii::$app->user->isGuest) {
           $product = Product::find($id);
           return $this->render('single',[
               'product'=>$product
           ]);
        }else{
            throw new ForbiddenHttpException('Доступ разрешен только для авторизированных пользователей');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    

}
