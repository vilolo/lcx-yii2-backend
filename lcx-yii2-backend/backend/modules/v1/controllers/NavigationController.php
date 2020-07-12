<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/23
 * Time: 18:39
 */

namespace backend\modules\v1\controllers;


use backend\modules\v1\controllers\base\BaseLoginController;
use common\error\ErrorCode;
use common\models\NavigationModel;
use common\utils\RetUtil;

class NavigationController extends BaseLoginController
{
    public function actionList(){
        $list = NavigationModel::instance()->getList();
        return RetUtil::successReturn($list);
    }

    public function actionFootList(){
        $list = NavigationModel::instance()->getList(true);
        return RetUtil::successReturn($list);
    }

    public function actionGetDetail(){
        $id = \Yii::$app->request->get('id');
        $detail = NavigationModel::instance()->findOne(['id' => $id]);
        return RetUtil::successReturn($detail);
    }

    public function actionDoSave(){
        $params = \Yii::$app->request->getBodyParams();
        $model = NavigationModel::instance();
        if (isset($params['pid']) && $params['pid']>0){
            $p = $model->findOne(['id' => $params['pid']]);
            $params['level'] = (int)$p['level'] + 1;
        }
        $res = $model->doSave($params);
        if ($res === ErrorCode::ERROR){
            return RetUtil::errorReturn();
        }
        $model->saveRelation($res);
        return RetUtil::successReturn();
    }
}