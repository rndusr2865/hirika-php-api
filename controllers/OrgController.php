<?php

namespace app\controllers;

use PHPUnit\Util\Log\JSON;
use Yii;

class OrgController extends \yii\web\Controller
{
    public $modelClass = 'app\models\Org';

    public function actionIndex()
    {
//        var_dump(Yii::$app->request->post());
//        return $this->render('index');
        return Yii::$app->request->post();
    }

    public function actionGet()
    {
        return Yii::$app->request->post();
    }

}
