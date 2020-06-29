<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/28
 * Time: 15:07
 */

namespace frontend\controllers;

use common\error\ErrorCode;
use common\models\CustomerMessageModel;
use common\models\ImgDescModel;
use common\utils\RetUtil;

class ContactUsController extends BaseController
{
    public function actionIndex(){
        $bannerList = ImgDescModel::instance()->getList(2, 1);
        return $this->render('index', [
            'banner' => $bannerList
        ]);
    }

    public function actionDoSave(){
        $params = \Yii::$app->request->post();
        unset($params['id']);
        $ip = \Yii::$app->request->userIP;
        $position = $this->curlGet('https://m.so.com/position?ip='.$ip);
        $params['ip'] = $ip??'';
        $params['position'] = $position??'';
        $res = CustomerMessageModel::instance()->doSave($params);
        if ($res === ErrorCode::ERROR){
            return RetUtil::errorReturn();
        }
        return 'success';
    }
}