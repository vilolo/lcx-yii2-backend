<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/27
 * Time: 15:10
 */

namespace frontend\controllers;


use common\models\ImgDescModel;

class IndexController extends BaseController
{
    public function actionIndex(){
        //banner
        $bannerList = ImgDescModel::instance()->getList(1);

        //轮播图
        $carousel = ImgDescModel::instance()->getList(4);
        
        //产品
        $product = ImgDescModel::instance()->getList(3);

        return $this->render('index', [
            'bannerList' => $bannerList,
            'carousel' => $carousel,
            'product' => $product
        ]);
    }
}