<?php

namespace backend\modules\v1\controllers\base;
use common\constants\BConstant;
use yii\web\Controller;
use yii\web\Response;

/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/18
 * Time: 16:35
 */
class BaseController extends Controller
{
    public function init()
    {
        $this->enableCsrfValidation = false;
    }
}