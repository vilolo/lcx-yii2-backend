<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/27
 * Time: 20:17
 */

namespace backend\modules\v1\controllers;


use backend\modules\v1\controllers\base\BaseController;
use common\error\ErrorCode;
use common\models\ImgDescCategoryModel;
use common\models\ImgDescModel;
use common\utils\RetUtil;

class ImgDescController extends BaseController
{
    public function actionList(){
        $list = ImgDescModel::instance()->getListAdmin();
        return RetUtil::successReturn($list);
    }

    public function actionDoSave(){
        $params = \Yii::$app->request->getBodyParams();
        $model = ImgDescModel::instance();

        $res = $model->doSave($params, 'img', 'img-desc');
        if ($res === ErrorCode::ERROR){
            return RetUtil::errorReturn();
        }
        return RetUtil::successReturn();
    }

    public function actionDetail(){
        $id = \Yii::$app->request->get('id');
        $detail = ImgDescModel::instance()->findOne(['id' => $id]);
        $detail['img'] = $detail['img'] ? \Yii::$app->request->hostInfo.'/'.$detail['img']:'';
        return RetUtil::successReturn($detail);
    }

    public function actionGetCategory(){
        $res = ImgDescCategoryModel::instance()->findAll(['status' => 1]);
        return RetUtil::successReturn($res);
    }
}