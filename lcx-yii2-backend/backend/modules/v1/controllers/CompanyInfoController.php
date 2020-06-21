<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/21
 * Time: 12:44
 */

namespace backend\modules\v1\controllers;

use backend\modules\v1\controllers\base\BaseLoginController;
use common\error\ErrorCode;
use common\error\ErrorInfo;
use common\models\CompanyInfoModel;
use common\utils\RetUtil;

class CompanyInfoController extends BaseLoginController
{
    public function actionGetInfo(){
        $res = CompanyInfoModel::instance()->findOneByCondition(['id' => 1]);
        if ($res == ErrorCode::ERROR){
            return RetUtil::errorReturn(ErrorInfo::getErrMsg());
        }
        return RetUtil::successReturn($res);
    }
    
    public function actionUpdate(){
        $data = \Yii::$app->request->getBodyParams();
        $res = CompanyInfoModel::instance()->updateDataByCondition(1,$data);
        if ($res === ErrorCode::ERROR){
            return RetUtil::errorReturn(ErrorInfo::getLogMsg());
        }

        return RetUtil::successReturn();
    }
}