<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/27
 * Time: 18:14
 */

namespace frontend\controllers;


use common\models\ArticleModel;
use common\models\ImgDescModel;

class ArticleController extends BaseController
{
    public function actionIndex()
    {
        $id = \Yii::$app->request->get('id');
        $article = ArticleModel::findOne(['id' => $id]);
        $bannerList = ImgDescModel::instance()->getList(2, 1);
        return $this->render('index', [
            'data' => $article,
            'banner' => $bannerList
        ]);
    }

    public function actionCategoryArticle(){
        $id = \Yii::$app->request->get('id');
        $list = ArticleModel::instance()->getAllByCondition(['category_id' => $id]);
        return $this->render('categoryList', [
            'list' => $list,
        ]);
    }
}