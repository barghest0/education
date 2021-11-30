<?php

namespace app\controllers;

use app\models\Cart;
use Yii;
use app\models\Product;
use app\models\Order;
use app\models\OrderItems;


class CartController extends AppController
{
    public function actionAdd($id, $qty = 1)
    {
        //добавление продукта в корзину
        $product = Product::findOne($id);
        if (!$product) return false;
        //создаем сессию
        $session = Yii::$app->session;
        //открываем сессию
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product, (int)$qty);
        $this->layout = false;
        return $this->render('cart-modal', ['session' => $session]);
    }

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $this->layout = false;
        return $this->render('cart-modal', ['session' => $session]);
    }

    //Экшен удаления 1 товара

    public function actionDelItem($id)
    {
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout = false;
        return $this->render('cart-modal', ['session' => $session]);
    }
    //Экшен показа корзины
    public function actionShow()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('cart-modal', ['session' => $session]);
    }
    //Экшен показа заказа
    public function actionView()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->setMeta('Корзина');
        $order = new Order();
        //Сравниваем поля модели и запроса, который мы в него передаем 
        if ($order->load(Yii::$app->request->post())) {
            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum'];
            //если мы сохранили данные, то передаем id в order_items
            if ($order->save()) {
                $this->saveOrderItems($session['cart'], $order->id);
                Yii::$app->session->setFlash('success', 'Ваш заказ принят');
                Yii::$app->mailer->compose('order', ['session' => $session, 'order' => $order])
                    ->setFrom(['bolshov03@mail.ru' => 'Админ']) //то, от кого будет отправляться письмо(для пользователя)
                    // ->setTo(Yii::$app->params['adminEmail']) //куда отправляем письмо
                    ->setTo($order->email) //куда отправляем письмо
                    ->setSubject('Заказ') //тема 
                    ->send(); //отправка
                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');
                return $this->refresh();
            } else {
                debug($order->getErrors());
                Yii::$app->session->setFlash('error', 'Ошибка оформления заказа');
            }
        }
        return $this->render('view', ['session' => $session, 'order' => $order]);
    }
    //Метод занесения товаров в таблицу
    private function saveOrderItems($items, $order_id)
    {
        foreach ($items as $id => $item) {
            //Создаем объект и заносим в него данные
            $order_items = new OrderItems();
            $order_items->order_id = $order_id;
            $order_items->product_id = $id;
            $order_items->name = $item['name'];
            $order_items->price = $item['price'];
            $order_items->qty_item = $item['qty'];
            $order_items->sum_item = $item['qty'] * $item['price'];
            //Сохраняем модель
            $order_items->save();
        }
    }
}
