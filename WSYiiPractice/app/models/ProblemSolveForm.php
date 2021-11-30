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
class ProblemSolveForm extends Problem
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
            ['photo_after', 'required'],
            ['photo_after', 'file', 'extensions'=>'png, jpg, jpeg', 'maxSize'=>10*1024*1024],
            
        ];
    }

}
