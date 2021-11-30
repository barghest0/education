<?php

namespace app\controllers;

use app\models\Category;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Product;
use Codeception\PHPUnit\Constraint\Page;
use yii\data\Pagination;

class CategoryController extends AppController
{
    public function actionIndex()
    {
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        return $this->render("index", ["hits" => $hits]);
    }


    public function actionView($id)
    {
        //вывод id из get
        // $id = Yii::$app->request->get('id');

        // $products = Product::find()->where(['category_id' => $id])->all();
        $query = Product::find()->where(['category_id' => $id]);
        //Создаем объект для пагинации
        //forsePageParam и pageSizeParam уберают информацию из гета
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, "pageSizeParam" => false]);
        //используем свойства объекта для оффсета и лимита
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        $category = Category::findOne($id);
        //Выбрасываем ексепшен, если не найдена категория
        if (!$category) {
            throw new \yii\web\HttpException(404, "Такой категории нет");
        }
        //устанавливаем метатеги
        $this->setMeta($category->name, $category->keywords, $category->description);

        return $this->render('view', ['products' => $products, 'category' => $category->name, 'pages' => $pages]);
    }

    public function actionSearch()
    {
        //получаем запрос из урла
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta('Поиск ' . $q);
        if (!$q) {
            return $this->render('search');
        }
        //ищем в бд совпадения
        $query = Product::find()->where(['like', 'name', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, "pageSizeParam" => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('search', ['products' => $products, 'pages' => $pages, 'q' => $q]);
    }
}
