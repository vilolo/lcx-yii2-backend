<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/18
 * Time: 15:21
 */

return [
    [
        'class' => 'yii\rest\UrlRule',
        'controller' => ['v1/demo'],
        'extraPatterns' => [
            'POST,OPTIONS index' => 'index',
        ],
    ],
    [
        'class' => 'yii\rest\UrlRule',
        'controller' => ['v1/login'],
        'extraPatterns' => [
            'POST,OPTIONS /' => 'login',
        ],
    ],
];