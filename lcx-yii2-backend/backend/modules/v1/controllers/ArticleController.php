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
use common\error\ErrorInfo;
use common\models\ArticleCategoryModel;
use common\models\ArticleModel;
use common\utils\RetUtil;

class ArticleController extends BaseController
{
    public function actionCategoryList(){
        $list = ArticleCategoryModel::instance()->getList();
        return RetUtil::successReturn($list);
    }

    public function actionSelectCategoryList(){
        $list = ArticleCategoryModel::instance()->getList(true);
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

    public function actionDelCategory(){
        $params = \Yii::$app->request->getBodyParams();
        $model = ArticleCategoryModel::instance();
        $res = $model->find()->where(['id' => $params['id']])->one()->delete();
        if ($res === false){
            return RetUtil::errorReturn($model->getErrMsg());
        }
        return RetUtil::successReturn();
    }

    public function actionCategoryDetail(){
        $params = \Yii::$app->request->get();
        $res = ArticleCategoryModel::instance()->findOne(['id' => $params['id']]);
        return RetUtil::successReturn($res);
    }

    public function actionList(){
        $list = ArticleModel::instance()->getList();
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
        $res = ArticleModel::instance()->find()->where(['status' => 1])->select('id, title, keyword')->all();
        return RetUtil::successReturn($res);
    }

    public function actionGetNews(){
        $res = ArticleModel::instance()->find()->where(['>', 'news', 0])->limit(2)
            ->select('id, news')
            ->all();
        return RetUtil::successReturn($res);
    }

    public function actionUpdateNews(){
        $params = \Yii::$app->request->post();
        $model = ArticleModel::instance();
        $model->updateAll(['news' => 0], ['>', 'news', 0]);
        if (isset($params['news1'])){
            $news1 = $model->findOne(['id' => $params['news1']]);
            if (!$news1){
                return RetUtil::errorReturn('文章不存在');
            }
            $news1->news = 1;
            $news1->save();
        }
        if (isset($params['news2'])){
            $news2 = $model->findOne(['id' => $params['news2']]);
            if (!$news2){
                return RetUtil::errorReturn('文章不存在');
            }
            $news2->news = 2;
            $news2->save();
        }
        return RetUtil::successReturn();
    }

    public function actionDel(){
        $params = \Yii::$app->request->getBodyParams();
        $model = ArticleModel::instance();
        $res = $model->find()->where(['id' => $params['id']])->one()->delete();
        if ($res === false){
            return RetUtil::errorReturn($model->getErrMsg());
        }
        return RetUtil::successReturn();
    }
}