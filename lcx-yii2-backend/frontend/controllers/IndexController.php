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

        //图标+文字
        $iconText = ImgDescModel::instance()->getList(5);

        //标题+文字+按钮
        $titleBtn1 = ImgDescModel::instance()->getList(6, 1);

        //标题+描述1
        $titleDesc1 = ImgDescModel::instance()->getList(7, 1);

        //标题+描述2
        $titleDesc2 = ImgDescModel::instance()->getList(8, 1);

        //视频
        $videos = ImgDescModel::instance()->getList(9);

        //底部按钮
        $bottomBtn = ImgDescModel::instance()->getList(10, 1);

        //底部按钮
        $titleDesc3 = ImgDescModel::instance()->getList(11, 1);

        //底部按钮
        $blog = ImgDescModel::instance()->getList(12);

        return $this->render('index', [
            'bannerList' => $bannerList,
            'carousel' => $carousel,
            'product' => $product,
            'iconText' => $iconText,
            'titleBtn1' => $titleBtn1,
            'titleDesc1' => $titleDesc1,
            'titleDesc2' => $titleDesc2,
            'videos' => $videos,
            'bottomBtn' => $bottomBtn,
            'titleDesc3' => $titleDesc3,
            'blog' => $blog,
        ]);
    }

    public function actionError(){
        return $this->render('error');
    }
}