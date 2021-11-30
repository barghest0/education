<?php

namespace app\controllers;

use app\models\RegForm;
use app\models\User;
use app\models\Problem;
use app\models\ProblemCreateForm;
use app\models\Category;
use app\models\ProblemSearch;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * UserController implements the CRUD actions for User model.
 */
class LkController extends Controller
{

    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['/site/login']);
            return false;
        }
        return true;

    }
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }


    

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProblemSearch();
        $dataProvider = $searchModel->searchForUser($this->request->queryParams,Yii::$app->user->identity->id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProblemCreateForm();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->photo_before = UploadedFile::getInstance($model,'photo_before');
                $newFileName = md5($model->photo_before->baseName. '.'. $model->photo_before->extension.time()) .'.'. $model->photo_before->extension;
                $model->photo_before->saveAs('@webroot/uploads/'.$newFileName);
                $model->photo_before = $newFileName;
                $model->idUser= Yii::$app->user->identity->id;
                $model->save();
                return $this->redirect(['/lk']);
            }
        } else {
            $model->loadDefaultValues();
        }

        $categories = Category::find()->all();
        $categories = ArrayHelper::map($categories,'id','name');

        return $this->render('create', [
            'model' => $model,
            'categories'=>$categories
        ]);
    }



    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        if ($this->findModel($id)->status == "Новая") {
            $this->findModel($id)->delete();
            Yii::$app->session->setFlash('success','Заявка успешно удалена');   
        }else{
            Yii::$app->session->setFlash('denger    ','Заявка не может быть удалена, так как ее статус был изменен администратором');   
        }
        

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Problem::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
