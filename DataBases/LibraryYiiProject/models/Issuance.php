<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%library_issuance}}".
 *
 * @property int $id
 * @property int $id_book
 * @property int $id_user
 * @property string|null $start_date
 * @property string|null $must_date
 * @property string|null $finish_date
 *
 * @property Book $book
 * @property User $user
 */
class Issuance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%library_issuance}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_book', 'id_user'], 'required'],
            [['id_book', 'id_user'], 'integer'],
            [['start_date', 'must_date', 'finish_date'], 'safe'],
            [['id_book'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['id_book' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            // 'id' => 'ID',
            'id_book' => 'Книга',
            'id_user' => 'Пользователь',
            'start_date' => 'Дата выдачи',
            'must_date' => 'Дата сдачи',
            'finish_date' => 'Дата фактической сдачи',
        ];
    }

    /**
     * Gets query for [[Book]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'id_book']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
