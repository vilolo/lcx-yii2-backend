<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2020/6/23
 * Time: 18:41
 */

namespace common\models;


use common\error\ErrorCode;

class NavigationModel extends BaseModel
{
    public function rules()
    {
        return [
          ['name', 'required'],
          ['url', 'safe'],
          ['level', 'integer'],
          ['pid', 'integer'],
          ['sort', 'integer'],
          ['status', 'in', 'range' => [1,2]],
        ];
    }

    public static function tableName()
    {
        return 'navigation';
    }
    
    public function getList(){
        $where = ['status' => 1];
        $list = $this->find()->where($where)->orderBy('relation, sort')->all();
        foreach ($list as $k => $v){
            if ($v['url']){
                if (strpos($v['url'], 'http') === false){
                    $list[$k]['url'] = \Yii::$app->params['frontendUrl'].'/'.$v['url'];
                }
            }
            $v['name'] = str_repeat('-->', $v['level']).$v['name'];
        }
        return $list;
    }

    public function saveRelation($id){
        $model = $this->findOne(['id' => $id]);
        if ($model->pid > 0){
            $p = $this->findOne(['id' => $model->pid]);
            $model->relation = $p->relation.','.$id;
        }else{
            $model->relation = $id;
        }
        $model->update();
    }
}