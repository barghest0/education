<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $FName
 * @property string|null $SName
 * @property string|null $TName
 * @property string|null $login
 * @property string|null $email
 * @property string|null $password
 * @property int|null $isAdmin
 *
 * @property Problem[] $problems
 */
class RegForm extends User
{
    public $confPassword;
    public $agree;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['isAdmin', 'integer'],
            ['login', 'match', 'pattern' => '/^[a-zA-Z]{1,}$/u', "message" => 'Только латинские буквы'],
            ['login', 'unique', "message" => 'Такой логин уже существует'],
            [['FName', 'SName', 'MName', 'login', 'email', 'password'], 'string', 'max' => 255],
            [['FName', 'SName', 'MName', 'login', 'email', 'confPassword', 'password', 'agree'], 'required'],
            ['confPassword', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли не совпадают'],
            ['email', 'email', 'message' => 'Некорректрый email'],
            ['agree', 'boolean'],
            ['agree', 'compare', 'compareValue' => true, 'message' => 'Необходимо согласиться']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'FName' => 'Имя',
            'SName' => 'Фамилия',
            'MName' => 'Отчество',
            'login' => 'Логин',
            'email' => 'Email',
            'password' => 'Пароль',
            'confPassword' => 'Подтверждение пароля',
            'agree' => 'Согласие на обработку данных',
            'isAdmin' => 'Is Admin',
        ];
    }
}
