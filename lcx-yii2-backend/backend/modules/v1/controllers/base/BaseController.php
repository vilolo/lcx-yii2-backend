<?php

namespace backend\modules\v1\controllers\base;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/18
 * Time: 16:35
 */
class BaseController extends Controller
{
    public function init()
    {
        parent::init();
        $this->enableCsrfValidation = false;
    }

    public function behaviors()
    {
        $cors = [
            'corsFilter' => [
                'class' => Cors::class,
                'cors' => [
                    'Origin' => \Yii::$app->params['corsOrigin'],
                    'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                    'Access-Control-Request-Headers' => ['*'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age' => 86400,
                ],
            ],
        ];

        $behaviors = ArrayHelper::merge(
            parent::behaviors(),$cors
        );
        return $behaviors;
    }
}