<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/27
 * Time: 15:13
 */

namespace frontend\controllers;


use common\models\CompanyInfoModel;
use common\models\NavigationModel;
use yii\web\Controller;

class BaseController extends Controller
{
    public function init(){
        //获取公司信息
        $company = CompanyInfoModel::findOne(['id' => 1]);
        if (isset($company['logo']) && $company['logo']){
            $company['logo'] = \Yii::$app->params['backendUrl'] . $company['logo'];
        }

        //获取导航菜单
        $navList = NavigationModel::find()->where(['status' => 1])->asArray()->all();
        $newNav = [];
        foreach ($navList as $k => $v){
            if ($v['level'] == 0){
                $newNav[$v['id']] = $v;
                unset($navList[$k]);
                foreach ($navList as $k2 => $v2){
                    if ($v2['pid'] == $v['id']){
                        $newNav[$v['id']]['child'][] = $v2;
                        unset($navList[$k2]);
                    }
                }
            }
        }

        \Yii::$app->view->params['company'] = $company;
        \Yii::$app->view->params['navList'] = $newNav;
    }
}