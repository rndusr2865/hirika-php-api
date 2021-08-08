<?php

namespace app\controllers;

use app\models\Org;
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
    public function actionAdd()
    {
        $payload = Yii::$app->request->post();
        $model = new Org();
        $model->org_name = $payload["org_name"];
        $model->save();
        if (!empty($payload["daughters"])) {
            foreach ($payload["daughters"] as $daughter) {
                $model = new Org();
                $model->org_name = $daughter["org_name"];
                $model->save();
                if (!empty($daughter["daughters"])) {

                }
            }
        }
//        return gettype($payload);
        return $payload["org_name"];
//        var_dump($payload);
    }

}
