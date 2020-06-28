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

        return $this->render('index', [
            'bannerList' => $bannerList
        ]);
    }
}