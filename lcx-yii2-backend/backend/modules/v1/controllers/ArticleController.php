<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/24
 * Time: 17:41
 */

namespace backend\modules\v1\controllers;


use backend\modules\v1\controllers\base\BaseController;
use common\error\ErrorCode;
use common\models\ArticleCategoryModel;
use common\models\ArticleModel;
use common\utils\RetUtil;

class ArticleController extends BaseController
{
    public function actionCategoryList(){
        $list = ArticleCategoryModel::instance()->getList();
        return RetUtil::successReturn($list);
    }

    public function actionCategorySave(){
        $params = \Yii::$app->request->getBodyParams();
        $res = ArticleCategoryModel::instance()->doSave($params);
        if ($res === ErrorCode::ERROR){
            return RetUtil::errorReturn();
        }
        return RetUtil::successReturn();
    }

    public function actionList(){
        $params = \Yii::$app->request->get();
        $list = ArticleModel::instance()->getList($params);
        return RetUtil::successReturn($list);
    }

    public function actionDoSave(){
        $params = \Yii::$app->request->getBodyParams();
        $res = ArticleModel::instance()->doSave($params, 'cover', 'article');
        if ($res === ErrorCode::ERROR){
            return RetUtil::errorReturn();
        }
        return RetUtil::successReturn();
    }

    public function actionGetDetail(){
        $params = \Yii::$app->request->get();
        $res = ArticleModel::instance()->findOne(['id' => $params['id']]);
        $res['cover'] = $res['cover'] ? \Yii::$app->request->hostInfo.'/'.$res['cover']:'';
        return RetUtil::successReturn($res);
    }

    public function actionGetSelectList(){
        $res = ArticleModel::instance()->find()->where(['status' => 1])->select('id, title')->all();
        return RetUtil::successReturn($res);
    }
}