<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property int $id
 * @property int $tour_id
 * @property string $full_name
 * @property string $birth_date
 * @property string $phone
 *
 * @property Tour $tour
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'booking';
    }

    public function extraFields()
    {
        return ['tour'];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tour_id', 'full_name', 'birth_date', 'phone'], 'required'],
            [['tour_id'], 'integer'],
            [['birth_date'], 'safe'],
            [['full_name'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 11],
            [['tour_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tour::className(), 'targetAttribute' => ['tour_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tour_id' => 'Tour ID',
            'full_name' => 'Full Name',
            'birth_date' => 'Birth Date',
            'phone' => 'Phone',
        ];
    }

    /**
     * Gets query for [[Tour]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTour()
    {
        return $this->hasOne(Tour::className(), ['id' => 'tour_id']);
    }
}
