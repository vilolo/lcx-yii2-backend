<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/18
 * Time: 16:33
 */

namespace backend\modules\v1\controllers;

use backend\modules\v1\controllers\base\BaseController;
use common\models\LoginForm;

class LoginController extends BaseController
{
    public function actionLogin(){
        //echo Yii::$app->security->validatePassword('123456', '$2y$13$iBRB6g3wbGndLLv.bCZxCOAu.AtfmUU4GS0eq5SfdOZ3.Wts0G4/2');die();
        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post(), '') && $model->login()) {
            \Yii::$app->session->set('UserInfo',
                json_encode(['uid' => \Yii::$app->user->identity['id'],
                    'username' => \Yii::$app->user->identity['username']], JSON_UNESCAPED_UNICODE));
            echo 'success';
        } else {
            echo 'error';
        }
    }
}