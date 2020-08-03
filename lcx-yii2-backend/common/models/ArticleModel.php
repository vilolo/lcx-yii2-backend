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
    public $category_name;
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

    public function getList()
    {
        $res = $this->find()
            //->select('a.id, a.title, a.cover, ifnull(ac.name, "") category_name, a.status, a.created_at, a.updated_at')
            ->select(['a.id', 'a.title', 'a.cover', 'ifnull(ac.name, "") category_name', 'a.status', 'a.created_at', 'a.updated_at'])
            ->alias('a')
            ->join('left join', 'article_category ac', 'a.category_id = ac.id')
            ->orderBy('id desc')
            ->asArray()
            ->all();
        foreach ($res as $k => $v){
            $res[$k]['cover'] = $v['cover'] ? \Yii::$app->params['backendUrl'].'/'.$v['cover']:'';
        }
        return $res;
    }

    public function getCategoryArticleList($id){
//        $res =
    }
}