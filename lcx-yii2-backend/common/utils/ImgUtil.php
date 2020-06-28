<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/21
 * Time: 22:54
 */

namespace common\utils;


use common\forms\UploadForm;
use yii\web\UploadedFile;

class ImgUtil
{
    public static function saveImg($field, $folder){
        $path = \Yii::$app->basePath."\\..\\common\\uploads\\".$folder;
        if (!file_exists($path)) {
            mkdir($path,true);
        }

        $model = new UploadForm();
        $model->load(\Yii::$app->request->post());
        if (\Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, $field);

            print_r($model->file);die('asf');

            if ($model->file && $model->validate()) {
                $model->file->saveAs($path . $model->file->baseName . '.' . $model->file->extension);
            }
        }

        return true;
    }
}