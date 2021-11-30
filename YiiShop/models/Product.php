<?php


namespace app\models;

use yii\db\ActiveRecord;
use app\models\Category;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'product';
    }

    public function getCategory()
    {
        // Связь один к одному, потому что к одному товару может относится только 1 категория
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
}
