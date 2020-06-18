<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/18
 * Time: 15:21
 */

return [
    [   // 供应商信息
        'class' => 'yii\rest\UrlRule',
        'controller' => ['v1/demo'],
        'extraPatterns' => [
            'GET,OPTIONS index' => 'index',
        ],
    ],
];