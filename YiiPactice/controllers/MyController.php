<?php


namespace app\controllers; //пространство имен



class MyController extends AppController
{
    //переданные в экшен параметры берутся из квери параметров
    public function actionIndex($id = '8439') //проверка на значение null
    {
        //создаем переменную и при рендере action передаем ее в сам компонент
        $hi = 'Hello World!';

        $monthes = ['Январь 01', 'Февраль 02', 'Март 03', 'Апрель 04', 'Май 05', 'Июнь 06', 'Июль 07', 'Август 08', 'Сентябрь 09', 'Октябрь 10', 'Ноябрь 11', 'Декабрь 12',];
        return $this->render('index', ['hi' => $hi, 'monthes' => $monthes, 'id' => $id]);

        //альтернативный способ передачи переменных, но преданные переменные будут одноименные
        // return $this->render('index', compact('hi', 'teachers', 'id'));
    }
}
