<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/24
 * Time: 23:14
 */

namespace common\models;


class ArticleModel extends BaseModel
{
    public function rules()
    {
        return [
            ['title', 'safe'],
            ['content', 'required'],
            ['cover', 'safe'],
            ['category_id', 'safe'],
            ['plugin_id', 'safe'],
            ['status', 'in', 'range' => [1,2]],
        ];
    }

    public static function tableName()
    {
        return 'article';
    }

    public function getList($params)
    {
        $res = $this->find()->select('id, title, cover, category_id, status, created_at, updated_at')
            ->orderBy('id desc')
            ->all();
        foreach ($res as $k => $v){
            $res[$k]['cover'] = $v['cover'] ? \Yii::$app->params['backendUrl'].'/'.$v['cover']:'';
        }
        return $res;
    }
}