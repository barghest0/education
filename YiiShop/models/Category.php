<?php


namespace app\models;

use yii\db\ActiveRecord;
use app\models\Product;


class Category extends ActiveRecord
{
    public  static function tableName()
    {
        return 'category';
    }
    public function getProducts()
    {


        //связь один ко многим, потому что к одной категории может относится несколько продуктов
        return $this->hasMany(Product::class, ['category_id' => "id"]);
    }
}
