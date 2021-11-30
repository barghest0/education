<?php

namespace app\models;

use yii\db\ActiveRecord;

//Если нам надо работать с данными, заданными в самоей модели, то мы наследуемся от Model, если же нам нужны данные из бд, наследуемся от ActiveRecord
class Product extends ActiveRecord
{

    //static позволяет обращаться к методам и свойствам класса без создания экземпляра с помощью ::
    //вызываем метод tableName для обращения к таблице бд
    public static function tableName()
    {
        return 'products';
    }

    //отложенная загрузка
    // public function getCategories()
    // {
    //     связи таблиц, один к одному
    //     return $this->hasOne(Category::class, ['id' => 'parent']);
    // }
}
