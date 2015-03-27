<?php
/**
 * @author Капенкин Дмитрий <dkapenkin@rambler.ru>
 * @date 26.03.15
 * @time 9:20
 * Created by JetBrains PhpStorm.
 */
namespace app\controllers;

use Yii;
use app\controllers\BaseRBACController;

class DefaultController extends BaseRBACController
{
    public $freeAccess = true;

    public function actionIndex()
    {
        return $this->render('index',[]);
    }

    public function actionPhoto()
    {
        return $this->render('index',[]);
    }

    public function actionCalculator()
    {
        return $this->render('index',[]);
    }

    public function actionContact()
    {
        return $this->render('index',[]);
    }

    public function actionFaq()
    {
        return $this->render('index',[]);
    }

    public function actionForum()
    {
        return $this->render('index',[]);
    }

    public function actionDocuments()
    {
        return $this->render('index',[]);
    }

    public function actionBrigade()
    {
        return $this->render('index',[]);
    }
}
