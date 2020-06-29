<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/28
 * Time: 16:52
 */

namespace backend\modules\v1\controllers;


use backend\modules\v1\controllers\base\BaseController;
use common\error\ErrorCode;
use common\models\CustomerMessageModel;
use common\utils\RetUtil;

class CustomerMessageController extends BaseController
{
    public function actionList(){
        $list = CustomerMessageModel::instance()->find()->all();
        return RetUtil::successReturn($list);
    }

    public function actionDoSave(){
        $params = \Yii::$app->request->post();
        if (!isset($params['id'])){
            return RetUtil::errorReturn('id 不存在');
        }
        $res = CustomerMessageModel::instance()->doSave(['id' => $params['id'], 'remark' => $params['remark']]);
        if ($res === ErrorCode::ERROR){
            return RetUtil::errorReturn();
        }
        return RetUtil::successReturn();
    }

}