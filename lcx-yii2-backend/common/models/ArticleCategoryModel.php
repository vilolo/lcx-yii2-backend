<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/24
 * Time: 17:47
 */

namespace common\models;


use common\error\ErrorCode;

class ArticleCategoryModel extends BaseModel
{
    public function rules()
    {
        return [
            ['name', 'required'],
            ['status', 'in', 'range' => [1,2]],
        ];
    }

    public static function tableName()
    {
        return 'article_category';
    }

    public function getList(){
        $list = $this->find()->all();
        return $list;
    }
    
}