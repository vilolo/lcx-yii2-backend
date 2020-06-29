<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/27
 * Time: 20:24
 */

namespace common\models;


class ImgDescModel extends BaseModel
{
    public function rules()
    {
        return [
            ['desc1', 'safe'],
            ['desc2', 'safe'],
            ['category_id', 'safe'],
            ['img', 'safe'],
            ['url', 'safe'],
            ['status', 'safe'],
            ['btn_name', 'safe'],
        ];
    }

    public static function tableName()
    {
        return 'img_desc';
    }

    public function getList($categoryId = 0, $limit = 0)
    {
        $where = ['status' => 1];
        if ($categoryId > 0){
            $where['category_id'] = $categoryId;
        }
        $model = $this->find()->where($where)->asArray()->orderBy('id desc');
        if ($limit>0){
            $model->limit($limit);
        }
        $res = $model->all();
        $type = [
            1 => '大Banner（1920*900）',
            2 => '小Banner（1920*300）',
            3 => '产品图1（600*500）',
            4 => '轮播图1（600*400）',
        ];

        foreach ($res as $k => $v){
            $res[$k]['img'] = $v['img'] ? \Yii::$app->params['backendUrl'].'/'.$v['img']:'';
            $res[$k]['category_id'] = $type[$v['category_id']]??'';
        }

        return $limit==1?($res[0]??[]):$res;
    }
}