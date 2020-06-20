<?php

namespace backend\modules\v1\controllers;
use backend\modules\v1\controllers\base\BaseLoginController;
use common\constants\BConstant;
use common\utils\RetUtil;

/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/18
 * Time: 15:29
 */
class DemoController extends BaseLoginController
{
    public function actionIndex(){
        return RetUtil::jsonReturn(BConstant::CODE_SUCCESS, '哈哈', [1,2,3]);
    }
}