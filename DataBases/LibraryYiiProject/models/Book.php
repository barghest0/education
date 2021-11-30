<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%library_book}}".
 *
 * @property int $id
 * @property string $name
 * @property int $id_publisher
 *
 * @property Publisher $publisher
 * @property BookGenre[] $BookGenres
 * @property Issuance[] $Issuances
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%library_book}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'id_publisher'], 'required'],
            [['id_publisher'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id_publisher'], 'exist', 'skipOnError' => true, 'targetClass' => Publisher::className(), 'targetAttribute' => ['id_publisher' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'id_publisher' => 'Id Publisher',
        ];
    }

    /**
     * Gets query for [[Publisher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPublisher()
    {
        return $this->hasOne(Publisher::className(), ['id' => 'id_publisher']);
    }

    /**
     * Gets query for [[BookGenres]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function aryBookGenres()
    {
        return $this->hasMany(BookGenre::className(), ['id_book' => 'id']);
    }

    /**
     * Gets query for [[Issuances]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIssuances()
    {
        return $this->hasMany(Issuance::className(), ['id_book' => 'id']);
    }
}
