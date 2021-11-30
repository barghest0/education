<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use app\models\Product;


class ProductController extends AppController
{
    public function actionView($id)
    {
        //делаем запрос для рекоментованых айтемов
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $id = Yii::$app->request->get('id');

        //делаем запрос для сигл айтема
        $product = Product::findOne($id);
        //Выбрасываем ексепшен, если не найден продукт
        if (!$product) {
            throw new \yii\web\HttpException(404, "Такого товара нет");
        }
        $this->setMeta($product->name, $product->keywords, $product->description);

        return $this->render('view', ['product' => $product, 'hits' => $hits]);
    }
}
