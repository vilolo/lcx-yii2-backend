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
    protected $identity;

    public function behaviors(){
        if (\Yii::$app->request->isOptions) {
            //options跨域，不需要做验证
            return parent::behaviors();
        }
        $rulesArr = [
            'authenticator' => [ //验证token
                'class' => BaseHttpBearerAuth::class,
                'from'=>$this
            ],
        ];

        $validate = ArrayHelper::merge(
            parent::behaviors(),$rulesArr
        );
        return $validate;
    }
}