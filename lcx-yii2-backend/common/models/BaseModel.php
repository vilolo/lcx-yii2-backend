<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/23
 * Time: 18:43
 */

namespace common\models;


use common\error\ErrorCode;
use common\error\ReturnErrorTrait;
use yii\db\ActiveRecord;

class BaseModel extends ActiveRecord
{
    use ReturnErrorTrait;

    //自动标记创建日期、更新日期
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord){
                if ($this->hasAttribute('created_at')) {
                    $this->created_at = time();
                }
            }else{
                if ($this->hasAttribute('created_at')) {
                    $this->created_at = strtotime($this->created_at);
                }

                if ($this->hasAttribute('updated_at')) {
                    $this->updated_at = time();
                }
            }
            return true;
        } else {
            return false;
        }
    }

    public function afterFind()
    {
        parent::afterFind();

        if ($this->hasAttribute('created_at') && $this->created_at) {
            $this->created_at = date('Y-m-d H:i:s', $this->created_at);
        }

        if ($this->hasAttribute('updated_at') && $this->updated_at) {
            $this->updated_at = date('Y-m-d H:i:s', $this->updated_at);
        }
    }

    public function updateBase64($file, $fileName, $folder = 'temp'){
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $file, $result)){
            $path = \Yii::$app->basePath."/web/uploads/".$folder;
            if (!file_exists($path)) {
                mkdir($path,true);
            }
            file_put_contents($path . '/' . $fileName, base64_decode(str_replace($result[1], '', $file)));
            return "/uploads/".$folder.'/'.$fileName;
        }
        return '';
    }

    public function upload($field, $folder = 'temp'){
        $path = \Yii::$app->basePath."/web/uploads/".$folder;
        if (!file_exists($path)) {
            mkdir($path,true);
        }
        $fileName = $this->$field->baseName . '.' . $this->$field->extension;
        $this->$field->saveAs($path . '/' . $fileName);
        $this->$field = "/uploads/".$folder.'/'.$fileName;
    }

    public function doSave($params, $imgField = null, $imgFolder = 'temp'){
        if (isset($params['id']) && $params['id'] > 0){
            $model = $this->findOne(['id' => $params['id']]);
        }else{
            $model = $this;
        }
        
        if ($params[$imgField] && $params['fileName']){
            $params[$imgField] = $model->updateBase64($params[$imgField], $params['fileName'], $imgFolder);
            if (!$params[$imgField]){
                return self::setAndReturn(ErrorCode::ERROR, '图片保存失败');
            }
        }else{
            unset($params[$imgField]);
        }

        if ($model->load($params, '') && $model->validate()){
            if ($model->save() === false){
                return self::setAndReturn(ErrorCode::ERROR, print_r($model->errors, true));
            }
        }else{
            return self::setAndReturn(ErrorCode::ERROR, !empty($model->errors)?print_r($model->errors, true):"参数加载失败");
        }

        return $model->id;
    }
}