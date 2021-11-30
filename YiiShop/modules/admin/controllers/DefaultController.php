<?php

namespace app\modules\admin\controllers;


/**
 * Default controller for the `admin` module
 */
class DefaultController extends AppAdminController
{

    public function actionIndex()
    {
        return $this->render('index');
    }
}
