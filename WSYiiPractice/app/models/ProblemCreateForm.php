<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "problem".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $date
 * @property int|null $idUser
 * @property int|null $idCategory
 * @property string|null $status
 * @property string|null $photoBefore
 * @property string|null $photoAfter
 *
 * @property Category $idCategory0
 * @property User $idUser0
 */
class ProblemCreateForm extends Problem
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'problem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'status','idCategory','photo_before'], 'string'],
            [['date'], 'safe'],
            [['idUser', 'idCategory'], 'integer'],
            ['photo_before', 'file', 'extensions'=>'png, jpg, jpeg', 'maxSize'=>10*1024*1024],
            [['name', 'photo_before', 'photo_after'], 'string', 'max' => 255],
            [['idCategory'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['idCategory' => 'id']],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
        ];
    }

}
