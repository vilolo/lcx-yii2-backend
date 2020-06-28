<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/21
 * Time: 13:21
 */

namespace common\models;


class CompanyInfoModel extends BaseModel
{
    public function formName()
    {
        return '';
    }


    /**
     * load 的时候需要safe
     * @return array
     */
    public function rules()
    {
        return [
            ['name', 'required', 'message' => 'name 不能为空'],
            ['email', 'safe'],
            ['phone', 'safe'],
            ['logo', 'safe'],
            ['description', 'safe'],
//            [['logo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }


    public static function tableName()
    {
        return 'company_info';
    }
    
}