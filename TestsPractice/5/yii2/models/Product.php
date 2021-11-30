<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\base\BaseObject;


class Product extends Model
{
    public $id;
    public $name;
    public $price;

    public $search;

    private static $products = [
        '1'=>[
            'id'=>'1',
            'name'=>'Монитор',
            'price'=>'11000'
        ],
        '2'=>[
            'id'=>'2',
            'name'=>'Клавиатура',
            'price'=>'350'
        ],
    ];

    public static function find($id){
        return self::$products[$id]? new static(self::$products[$id]):null;
    }

    public static function findAll(){
        $res = [];
        foreach (self::$products as $product) {
           $res []= new static($product);
        }
        return $res;
    }
    
    

    public static function search($query){
        $res = [];
        foreach (self::$products as $product) {
            if (gettype(strpos($product['name'], $query)) === 'integer') {
                $res []= new static($product);
            }         
        }
        return $res;
    }


}
