<?php

namespace common\utils;
use common\constants\BConstant;
use yii\web\Response;

/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/19
 * Time: 18:52
 */
class RetUtil
{
    public static function arrReturn($code, $msg = '', $data = ''){
        return [
            'code' => $code,
            'msg' => $msg ? $msg : ($code == BConstant::CODE_SUCCESS ? '成功' : '失败'),
            'data' => $data
        ];
    }

    public static function jsonReturn($code, $msg = '', $data = ''){
        $returnData = self::arrReturn($code, $msg, $data);
        \Yii::$app->response->format = Response::FORMAT_JSON;
        \Yii::$app->response->data =  $returnData;
        return \Yii::$app->response->data;
    }

    public static function successReturn(){
        return self::jsonReturn(BConstant::CODE_SUCCESS);
    }

    public static function errorReturn(){
        return self::jsonReturn(BConstant::CODE_REEOR);
    }
}