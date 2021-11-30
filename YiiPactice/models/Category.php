<?php

namespace app\models;

use yii\db\ActiveRecord;

//Если нам надо работать с данными, заданными в самоей модели, то мы наследуемся от Model, если же нам нужны данные из бд, наследуемся от ActiveRecord
class Category extends ActiveRecord
{

    //static позволяет обращаться к методам и свойствам класса без создания экземпляра с помощью ::
    //вызываем метод tableName для обращения к таблице бд
    public static function tableName()
    {
        return 'categories';
    }


    public function getProducts()
    {
        // связи таблиц, один ко многим
        return $this->hasMany(Product::class, ['parent' => 'id']);
    }
}
