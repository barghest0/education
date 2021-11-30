<?php

namespace app\controllers;

use Yii;
use app\models\Category; //подключение нашей модели
use app\models\TestForm; //подключение нашей модели

class PostController extends AppController
{
    //шаблон basic в PostController
    public $layout = 'basic';

    //отключение защиты для post запроса
    public function beforeAction($action)
    {
        //тк мы отправляем запрос на index, то в экшене и ищем поле id, которое должно быть равно index
        if ($action->id == 'index') {
            //отпключаем защиту
            $this->enableCsrfValidation = false;
        }
        //отрисовываем
        return parent::beforeAction($action);
    }


    public function actionIndex()
    {
        $model = new TestForm();
        // $post = TestForm::findOne(2);
        // $post->email = "asd@mail.ru";
        //удаление поста
        // $post->delete();
        //удаление всех записей
        // TestForm::deleteAll(['>', 'id', 1]);


        // if (Yii::$app->request->isAjax) {
        //     \debug($_POST);
        //     return 'test';
        // }

        //проверка на успешность загрузки в модель
        if ($model->load(Yii::$app->request->post())) {
            //проверка на валидность, потому что мы задали свое правило
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Данные приняты');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка');
            }
        }
        return $this->render('index', ['model' => $model]);
    }
    public function actionShow()
    {
        // $this->layout = 'basic'; //подключение basic только для отдельной страницы
        $this->view->title = "Одна статья";
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевики...']);
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'описание страницы...']);

        //сортировка по id
        // $cats = Category::find()->orderBy(['id' => SORT_DESC])->all();

        //формат массива с выборкой с помощью were
        // $cats = Category::find()->asArray()->where('parent=691')->all();
        // $cats = Category::find()->asArray()->where(['parent' => 691])->all();

        //использование like
        // $cats = Category::find()->asArray()->where(['like', 'title', 'pp'])->all();

        //использование операторов сравнения
        // $cats = Category::find()->asArray()->where(['<=', 'id', '695'])->all();

        //лимитируем вывод
        // $cats = Category::find()->asArray()->where(['parent' => 691])->limit(1)->all();

        //выводим количество записей
        // $cats = Category::find()->asArray()->where(['parent' => 691])->limit(1)->count();

        //вывод одной записи по условию
        // $cats = Category::findOne(['parent' => 691]);

        //вывод всех записей по условию
        // $cats = Category::findAll(['parent' => 691]);

        //вывод с помощью sql запроса
        // $query = "SELECT * FROM categories WHERE title LIKE :search";
        // $cats = Category::findBySql($query, [':search' => '%pp%'])->all();

        //отложенная загрузка данных
        //из за того, что мы модели передаем обозначаем то, что будем передавать, мы передаем просто число
        // $cats = Category::findOne(694);

        //жадная загрузка данных
        // $cats = Category::find()->with('products')->where('id=694')->all();

        $cats = Category::find()->all();



        return $this->render('show', ['cats' => $cats]);
    }
}
