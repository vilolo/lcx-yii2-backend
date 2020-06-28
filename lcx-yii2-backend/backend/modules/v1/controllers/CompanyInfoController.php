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
use yii\web\UploadedFile;

class CompanyInfoController extends BaseLoginController
{
    private $cid = 1;
    public function actionGetInfo(){
        $res = CompanyInfoModel::instance()->findOne(['id' => $this->cid]);
        if ($res == ErrorCode::ERROR){
            return RetUtil::errorReturn(ErrorInfo::getErrMsg());
        }

        $res['logo'] = $res['logo'] ? \Yii::$app->params['backendUrl'].'/'.$res['logo']:'';
        return RetUtil::successReturn($res);
    }

    public function actionUpdateInfo(){
        $data = \Yii::$app->request->post();
        $model = CompanyInfoModel::instance();
        $res = $model->findOne(['id' => $this->cid]);
        if ($res){
            $model = $res;
        }else{
            $model->id = $this->cid;
        }
        $imgField = 'logo';
        if ($data[$imgField] && $data['fileName']){
            $data[$imgField] = $model->updateBase64($data[$imgField], $data['fileName'], $imgField);
        }else{
            unset($data[$imgField]);
        }
        if ($model->load($data) && $model->validate()){
            $model->save();
            return RetUtil::successReturn();
        }else{
            return RetUtil::errorReturn(print_r($model->errors, true));
        }
    }

    public function actionUpdateForm(){
        $data = \Yii::$app->request->post();
        $model = CompanyInfoModel::instance();
        $res = $model->findOne(['id' => 1]);
        if ($res){
            $model = $res;
        }else{
            $model->id = 1;
        }
        $imgField = 'logo';
        $img = UploadedFile::getInstance($model, $imgField);
        if ($img){
            $data[$imgField] = $img;
        }
        if ($model->load($data) && $model->validate()){
            if ($data[$imgField]){
                $model->upload($imgField, $imgField);
            }
            $model->save();
            return 'ok';
        }else{
            return RetUtil::errorReturn(print_r($model->errors, true));
        }
    }
}