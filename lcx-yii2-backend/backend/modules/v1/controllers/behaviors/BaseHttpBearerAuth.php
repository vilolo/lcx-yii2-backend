<?php

namespace backend\modules\v1\controllers\behaviors;
use common\error\ErrorCode;
use yii\filters\auth\HttpBasicAuth;
use yii\web\UnauthorizedHttpException;

/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/18
 * Time: 16:41
 */
class BaseHttpBearerAuth extends HttpBasicAuth
{
    public $from;

    public function authenticate($user, $request, $response)
    {
//        if(empty($this->from->identity)) {
//            $identity = parent::authenticate($user, $request, $response);
//            if ($identity === null) {
//                throw new UnauthorizedHttpException('用户未登陆');
//            }
//
//            $this->from->identity = $identity;
//        }
//        return $this->from->identity;

        if (empty($this->from->identity)){
            $userInfo = \Yii::$app->session->get('UserInfo');
            if (!$userInfo){
                throw new UnauthorizedHttpException('未登陆',401);
            }
            $this->from->identity = json_decode($userInfo, true);
        }

        return $this->from->identity;
    }
}