<?php

namespace app\models;

use yii\base\Model;
use yii\db\ActiveRecord;

class TestForm extends ActiveRecord
{
    public static function tableName(){
        return "posts";
    }

    // public $name;
    // public $email;
    // public $text;
    //Задаем лейблы, чтобы не задавать из в самой форме
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'Email',
            'text' => 'Текст сообщения',
        ];
    }
    //задаем правила валидации
    public function rules()
    {
        //нужно прописать все поля, иначе они будут null
        return [
            [['name', 'email'], 'required'], //обязательные поля
            ['email', 'email'], //соответствии с email
            // ['name', 'string', 'min'=>2, 'tooShort'=>'Мало'], //проверка на длинну
            // ['name', 'string', 'max'=>5, 'tooLong'=>'Много'] //проверка на длинну
            // ['name', 'string', 'length' => [2, 5]], //альтернатива проверки выше
            ['text', 'trim']
        ];
    }
    //если пользователь введет не hello и не world, то ошибка
    public function myRule($attr)
    {
        if (!in_array($this->$attr, ['hello', 'world'])) {
            $this->addError($attr, "Wrong!");
        }
    }
}
