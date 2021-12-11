<?php

namespace app\controllers;


use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use app\models\Booking;
use app\models\Tour;

use yii;
/**
 * BookingController implements the CRUD actions for Booking model.
 */
class BookingController extends ActiveController
{
    public $modelClass = 'app\models\Booking';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        return $actions;
    }

    public function actionCreate(){
        $params = Yii::$app->request->post();
        $tour = Tour::find()->where(['id'=>$params['tour_id']])->one();
        $price = 0;
        foreach ($params['passengers'] as $key => $value) {
            $model = new Booking(); 
            $model->tour_id = $params['tour_id'];
            $model->full_name = $value['full_name'];
            $model->birth_date = $value['birth_date'];
            $model->phone = $value['phone'];
            if ($model->save()) {
                $price += $tour->price;
            }
        }
        return $price;
    }
}


// {
//     "tour_id":1,
//     "passengers":[
//         {
//             "full_name":"asdasd",
//             "birth_date":"2001-10-10",
//             "phone":182939182
//         },
//         {
//             "full_name":"asdasd2",
//             "birth_date":"2001-10-10",
//             "phone":182939182
//         }
//     ]
// }