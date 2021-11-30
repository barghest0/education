<?php

namespace app\models;

use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{

    public function addToCart($product, $qty = 1)
    {
        //если в корзине уже есть товар, то добавляем количество
        if ($_SESSION['cart'][$product->id]) {
            $_SESSION['cart'][$product->id]['qty'] += $qty;
        } else {
            //добавляем в сессию товар
            $_SESSION['cart'][$product->id] = [
                'qty' => $qty,
                'name' => $product->name,
                'price' => $product->price,
                'img' => $product->img
            ];
        }
        //Добавляем количество товаров и из стоимость в сессию
        $_SESSION['cart.qty'] = $_SESSION['cart.qty'] ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = $_SESSION['cart.sum'] ? $_SESSION['cart.sum'] + $qty * $product->price : $qty * $product->price;
    }
    //метод удаления товара из корзины, который вы забыли прописать (скорее всего я что-то пропустил)
    public function recalc($id)
    {
        $_SESSION['cart.qty'] = $_SESSION['cart.qty'] - $_SESSION['cart'][$id]['qty'];
        $_SESSION['cart.sum'] =  $_SESSION['cart.sum'] -  ($_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price']);
        unset($_SESSION['cart'][$id]);
    }
}
