<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%library_user}}".
 *
 * @property int $id
 * @property string $lastname
 * @property string $firstname
 * @property string $birthdate
 *
 * @property Issuance[] $Issuances
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%library_user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lastname', 'firstname', 'birthdate'], 'required'],
            [['birthdate'], 'safe'],
            [['lastname', 'firstname'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            // 'id' => 'ID',
            'lastname' => 'Фамилия',
            'firstname' => 'Имя',
            'birthdate' => 'Дата рождения',
        ];
    }

    /**
     * Gets query for [[Issuances]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIssuances()
    {
        return $this->hasMany(Issuance::className(), ['id_user' => 'id']);
    }
}
