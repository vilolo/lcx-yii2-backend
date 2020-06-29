<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/28
 * Time: 15:02
 */

namespace common\models;


class CustomerMessageModel extends BaseModel
{
    public function rules()
    {
        return [
            ['name', 'safe'],
            ['email', 'safe'],
            ['message', 'safe'],
            ['subject', 'safe'],
            ['ip', 'safe'],
            ['position', 'safe'],
            ['remark', 'safe'],
        ];
    }

    public static function tableName()
    {
        return 'customer_message';
    }
}