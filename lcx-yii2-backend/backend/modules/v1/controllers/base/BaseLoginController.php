<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/18
 * Time: 16:35
 */

namespace backend\modules\v1\controllers\base;


use backend\modules\v1\controllers\behaviors\BaseHttpBearerAuth;
use yii\helpers\ArrayHelper;

class BaseLoginController extends BaseController
{
    public $identity;

    public function behaviors(){
        if (\Yii::$app->request->isOptions) {
            //options跨域，不需要做验证
            return parent::behaviors();
        }

        $behaviors = parent::behaviors();

        $auth = [ //验证token
            'class' => BaseHttpBearerAuth::class,
            'from'=>$this
        ];

        //排序
        unset($behaviors['authenticator']);
        $behaviors['authenticator'] = $auth;

        return $behaviors;
    }
}