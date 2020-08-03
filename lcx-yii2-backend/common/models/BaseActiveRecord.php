<?php

namespace common\models;

use common\error\ErrorCode;
use phpDocumentor\Reflection\Types\Boolean;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ExpressionInterface;
use yii\db\Query;

/**
 * 自定义的AR基类.
 */
class BaseActiveRecord extends \yii\db\ActiveRecord
{
    use \common\error\ReturnErrorTrait;

    const DEL_STATE_NO = 0; //未删除
    const DEL_STATE_YES = 1; //已删除

    /**
     * 是否将对返回结果进行强类型转换, true 是, false 否.
     * 作用于getAllByCondition、getListByCondition、findOneByCondition、findByConditionList
     *
     * @var boolean
     */
    protected $_phpTypecast = false;

    //自动标记创建日期、更新日期
    public function beforeSave($insert)
    {
        if ($this->hasAttribute('created_at') && $insert) {
            $this->created_at = time();
        }
        if ($this->hasAttribute('updated_at') && !$insert) {
            $this->updated_at = time();
        }

        return parent::beforeSave($insert);
    }

    /**
     * demo:
     *  in: ['column'=>['in'=>[1,2,3,4]]].
     *
     * 根据条件查询多条数据不分页
     *
     * @param array $condition 条件
     * @param string $orderBy 排序
     * @param array $columns 查询的字段
     * @param boolean $distinct
     *
     * @return string
     */
    public function getAllByCondition(array $condition, $orderBy = 'id DESC', array $columns = [], $distinct = false)
    {
        //$condition['del_state'] = self::DEL_STATE_NO;
        $modelClass = get_class($this);
        try {
            /**
             * @var Query $records
             */
            $records = $modelClass::find();
            foreach ($condition as $_field => $value) {
                if ($_field === 'or') {
                    foreach ($value as $column => $vals) {
                        $whe = array_keys($vals)[0];
                        $val = array_values($vals)[0];
                        if (strtolower($whe) === 'between') {
                            $records->orWhere([$whe, $column, reset($val), end($val)]);
                            continue;
                        } elseif (strtolower($whe) === 'exists') {
                            $records->orWhere([$whe, $val]);
                            continue;
                        }
                        $records->orWhere([$whe, $column, $val]);
                        continue;
                    }
                } else {
                    if ($value instanceof ExpressionInterface) {
                        $records->andWhere($value, $value->params);
                        continue;
                    } elseif (!is_array($value)) {
                        if ($value === '' || $value === 'all') {
                            continue;
                        }
                        $records->andWhere([$_field => $value]);
                        continue;
                    }

                    foreach ($value as $whe => $val) {
                        if (strtolower($whe) === 'between') {
                            $records->andWhere([$whe, $_field, reset($val), end($val)]);
                            continue;
                        } elseif (strtolower($whe) === 'exists') {
                            $records->andWhere([$whe, $val]);
                            continue;
                        } elseif (strtolower($whe) === 'not exists') {
                            $records->andWhere([$whe, $val]);
                            continue;
                        }
                        $records->andWhere([$whe, $_field, $val]);
                        continue;
                    }
                }
            }
            //echo $records->orderBy($orderBy)->createCommand()->getRawSql();die();
            if (!empty($columns)) {
                $records->select($columns);
            }

            if ($distinct) {
                $records->distinct();
            }

            $rows = $records->orderBy($orderBy)->asArray()->all();
            if ($this->_phpTypecast) {
                return self::populate($rows);
            }

            return $rows;
        }
        catch (\Exception $e) {
            return self::setAndReturn(ErrorCode::ERR_DATABASE_ERROR, $e->getMessage() . ',orderby' . $orderBy . ',condition' . var_export($condition, true) . ',$columns:' . var_export($columns, true));
        }
    }

    /**
     * demo:
     *  in: ['column'=>['in'=>[1,2,3,4]]].
     *
     * 根据条件批量查询多条数据并分页
     *
     * @param array $condition 搜索条件
     * @param string $offset 查询起始位置
     * @param string $limit 查询条数
     * @param string $orderBy 排序
     * @param array $columns 查询字段
     * @param boolean $distinct
     *
     * @return mixed
     */
    public function getListByCondition(array $condition, $offset, $limit, $orderBy = 'id DESC', array $columns = [], $distinct = false)
    {
        $condition['del_state'] = self::DEL_STATE_NO;
        $modelClass = get_class($this);
        try {
            $records = $modelClass::find();
            foreach ($condition as $_field => $value) {
                if ($_field === 'or') {
                    foreach ($value as $column => $vals) {
                        $whe = array_keys($vals)[0];
                        $val = array_values($vals)[0];
                        if (strtolower($whe) === 'between') {
                            $records->orWhere([$whe, $column, reset($val), end($val)]);
                            continue;
                        } elseif (strtolower($whe) === 'exists') {
                            $records->orWhere([$whe, $val]);
                            continue;
                        }
                        $records->orWhere([$whe, $column, $val]);
                        continue;
                    }
                } else {
                    if ($value instanceof ExpressionInterface) {
                        $records->andWhere($value, $value->params);
                        continue;
                    } elseif (!is_array($value)) {
                        if ($value === '' || $value === 'all') {
                            continue;
                        }
                        $records->andWhere([$_field => $value]);
                        continue;
                    }

                    foreach ($value as $whe => $val) {
                        if (strtolower($whe) === 'between') {
                            $records->andWhere([$whe, $_field, reset($val), end($val)]);
                            continue;
                        } elseif (strtolower($whe) === 'exists') {
                            $records->andWhere([$whe, $val]);
                            continue;
                        } elseif (strtolower($whe) === 'not exists') {
                            $records->andWhere([$whe, $val]);
                            continue;
                        }
                        $records->andWhere([$whe, $_field, $val]);
                        continue;
                    }
                }
            }

            if (!empty($columns)) {
                $records->select($columns);
            }
            if ($distinct) {
                $records->distinct();
            }

            //echo $records->offset($offset)->limit($limit)->orderBy($orderBy)->createCommand()->getRawSql();die;
            $rows = $records->offset($offset)->limit($limit)->orderBy($orderBy)->asArray()->all();
            if ($this->_phpTypecast) {
                return self::populate($rows);
            }
            return $rows;
        }
        catch (\Exception $e) {
            return self::setAndReturn(ErrorCode::ERR_DATABASE_ERROR, $e->getMessage() . ',orderby' . $orderBy . ',condition' . var_export($condition, true) . ',$columns:' . var_export($columns, true) . ',$offset:' . $offset . ',limit:' . $limit);
        }
    }

    /**
     * demo:
     *  in: ['column'=>['in'=>[1,2,3,4]]].
     *
     * 根据条件查询数量
     *
     * @param array $condition 查询条件
     * @param string $field 查询字段
     * @param boolean $distinct
     *
     * @return mixed
     */
    public function getCountByCondition(array $condition, $field = 'id', $distinct = false)
    {
        $condition['del_state'] = self::DEL_STATE_NO;
        $modelClass = get_class($this);
        try {
            /**
             * @var ActiveQuery
             */
            $records = $modelClass::find();
            foreach ($condition as $_field => $value) {
                if ($_field === 'or') {
                    foreach ($value as $column => $vals) {
                        $whe = array_keys($vals)[0];
                        $val = array_values($vals)[0];
                        if (strtolower($whe) === 'between') {
                            $records->orWhere([$whe, $column, reset($val), end($val)]);
                            continue;
                        } elseif (strtolower($whe) === 'exists') {
                            $records->orWhere([$whe, $val]);
                            continue;
                        }
                        $records->orWhere([$whe, $column, $val]);
                        continue;
                    }
                } else {
                    if ($value instanceof ExpressionInterface) {
                        $records->andWhere($value, $value->params);
                        continue;
                    } elseif (!is_array($value)) {
                        if ($value === '' || $value === 'all') {
                            continue;
                        }
                        $records->andWhere([$_field => $value]);
                        continue;
                    }

                    foreach ($value as $whe => $val) {
                        if (strtolower($whe) === 'between') {
                            $records->andWhere([$whe, $_field, reset($val), end($val)]);
                            continue;
                        } elseif (strtolower($whe) === 'exists') {
                            $records->andWhere([$whe, $val]);
                            continue;
                        } elseif (strtolower($whe) === 'not exists') {
                            $records->andWhere([$whe, $val]);
                            continue;
                        }
                        $records->andWhere([$whe, $_field, $val]);
                        continue;
                    }
                }
            }

            if ($field === '') {
                $primaryKeys = self::primaryKey();
                $field = $primaryKeys[0];
            }
            //echo $records->createCommand()->getRawSql();exit;

            if ($distinct) {
                $records->distinct();
            }
            return $records->count($field);
        }
        catch (\Exception $e) {
            return self::setAndReturn(ErrorCode::ERR_DATABASE_ERROR, $e->getTraceAsString() . '<br/>' . $e->getMessage() . '<br/>' . ',condition' . var_export($condition, true) . ',$field:' . var_export($field, true));
        }
    }

    /**
     * 添加数据.
     *
     * @param array $postdata
     * @param boolean $returnLastId 是否返回最新的Id
     *
     * @return bool
     */
    public function createData(array $postdata, Boolean $returnLastId = null)
    {
        try {
            $model = new static();
            foreach ($postdata as $key => $val) {
                $model->$key = $val;
            }
            if (!$model->save()) {
                return self::setAndReturn(ErrorCode::ERR_DATABASE_ERROR, '添加数据出错.postdata:' . var_export($postdata, true));
            }
            return $returnLastId ? $model->id : true;
        }
        catch (\Exception $e) {
            return self::setAndReturn(ErrorCode::ERR_DATABASE_ERROR, $e->getMessage());
        }
    }

    /**
     * 修改单条数据.
     *
     * @param $id
     * @param $update
     * @param $condition
     *
     * @return bool|string
     */
    public function updateDataByCondition($id, $update, $condition = [])
    {
        $condition['id'] = $id;
        try {
            $record = self::find()->where($condition);
            if (!empty($columns)) {
                $record->select($columns);
            }
            $model = $record->one();
            if (empty($model)) {
                return self::setAndReturn(ErrorCode::ERR_SERVER_ERROR, 'id:' . $id . ',update:' . var_export($update, true) . ',condition:' . var_export($condition, true), '修改的信息不存在');
            }
            foreach ($update as $attr => $val) {
                $model->$attr = $val;
            }
            $result = $model->save();
            if ($model->hasErrors()) {
                return self::setAndReturn(ErrorCode::ERR_DATABASE_ERROR, print_r($model->getErrorSummary(true), true));
            } else {
                return $result;
            }
        }
        catch (\Exception $e) {
            return self::setAndReturn(ErrorCode::ERR_DATABASE_ERROR, '根据条件修改一条数据异常:' . $e->getMessage() . "\n{$e->getTraceAsString()}" . 'id:' . $id . ',update:' . var_export($update, true) . ',condition:' . var_export($condition, true));
        }
    }

    /**
     * 根据ID更新计数器
     * @param int $id ID
     * @param array $counters [计数器字段1 => 增量1, 计数器字段2 => 增量2]
     * @return string|int 成功返回更新记录条数
     */
    public function updateCountersById($id, $counters)
    {
        try {
            $result = self::updateAllCounters($counters, ['id' => $id]);
        }
        catch (\Exception $e) {
            return self::setAndReturn(ErrorCode::ERR_DATABASE_ERROR, '根据ID修改统计数据异常:' . $e->getMessage() . "\n{$e->getTraceAsString()}" . 'id:' . $id . ',counters:' . var_export($counters, true));
        }
        return $result;
    }

    /**
     * 根据条件更新计数器
     * @param $counters
     * @param string $condition
     * @param array $params
     * @return int|string
     *
     */
    function updateCountersByCondition($counters, $condition = '', $params = [])
    {
        try {
            $result = self::updateAllCounters($counters, $condition, $params);
        }
        catch (\Exception $e) {
            return self::setAndReturn(ErrorCode::ERR_DATABASE_ERROR, '根据ID修改统计数据异常:' . $e->getMessage() . "\n{$e->getTraceAsString()}" . ',counters:' . var_export($counters, true));
        }
        return $result;
    }

    /**
     * 根据查询条件获取Model
     * @param array | string $where
     * @param array $columns
     * @param array $orderBy
     * @param array $params
     * @return mixed
     */
    public function findOneByCondition($where = [], $columns = [], $orderBy = [], $params = [])
    {

        $record = self::find();
        if ($params) {
            $where = 'del_state = :del_state ' . ($where ? " AND {$where}" : "");
            $params['del_state'] = self::DEL_STATE_NO;
            $record = $record->where($where, $params);
        } else {
            $where['del_state'] = self::DEL_STATE_NO;
            $record = $record->where($where);
        }
        if (!empty($columns)) {
            $record->select($columns);
        }
        if (!empty($orderBy)) {
            $record->orderBy($orderBy);
        }
        $result = $record->asArray()->one();
        if (empty($result)) {
            return $result;
        }

        if ($this->_phpTypecast) {
            $rows = self::populate([$result]);
            return reset($rows) ?: null;
        }
        return $result;
    }

    /**
     * 根据查询条件获取字段值
     * @param $feild
     * @param array $where
     * @return mixed
     */
    public function findScalarCondition($feild, array $where = [])
    {
        $where['del_state'] = self::DEL_STATE_NO;
        $record = self::find()->select($feild)->where($where);
        return $record->scalar();
    }

    /**
     * 批量插入
     * @param array $columns 插入的列(一维数组)
     * @param array $dataArr 插入的列(插入的数据，二维数组)
     * @return int|string
     */
    public function batchInsertData(array $columns, array $dataArr)
    {
        try {
            return Yii::$app->db->createCommand()->batchInsert(self::tableName(), $columns, $dataArr)->execute();
        }
        catch (\Exception $e) {
            return self::setAndReturn(ErrorCode::ERR_DATABASE_ERROR, $e->getMessage());
        }
    }

    /**
     * 根据条件获取列表
     * * @param array ["where"=> [$columns=>$value], 'orderBy'=> ,'Limit'=>]
     * @return array|bool|null|\yii\db\ActiveRecord
     */
    public function findByConditionList($parama)
    {
        try {
            $query = self::find();
            if (!empty($parama['where'])) {
                $query->where($parama['where']);
            }
            if (!empty($parama['orderBy'])) {
                $query = $query->orderBy($parama['orderBy']);
            }
            if (!empty($parama['limit'])) {
                $query = $query->limit($parama['limit']);
            }

            $rows = $query->asArray()->all();

            if ($this->_phpTypecast) {
                return self::populate($rows);
            }
            return $rows;
        }
        catch (\Exception $e) {
            return self::setAndReturn(ErrorCode::ERR_DATABASE_ERROR, $e->getMessage());
        }
    }

    /**
     * demo:
     *  in: ['column'=>['in'=>[1,2,3,4]]].
     *
     * 根据条件查询数量
     *
     * @param array $condition 查询条件
     * @param string $field 查询字段
     * @param boolean $distinct
     *
     * @return mixed
     */
    public function getCountByFieldCondition(array $condition, $field = 'id', $distinct = false)
    {
        $condition['del_state'] = self::DEL_STATE_NO;
        $modelClass = get_class($this);

        try {
            /**
             * @var ActiveQuery
             */
            $records = $modelClass::find();
            foreach ($condition as $_field => $value) {
                if ($_field === 'or') {
                    foreach ($value as $column => $vals) {
                        $whe = array_keys($vals)[0];
                        $val = array_values($vals)[0];
                        if (strtolower($whe) === 'between') {
                            $records->orWhere([$whe, $column, reset($val), end($val)]);
                            continue;
                        } elseif (strtolower($whe) === 'exists') {
                            $records->orWhere([$whe, $val]);
                            continue;
                        }
                        $records->orWhere([$whe, $column, $val]);
                        continue;
                    }
                } else {
                    if ($value instanceof ExpressionInterface) {
                        $records->andWhere($value, $value->params);
                        continue;
                    } elseif (!is_array($value)) {
                        if ($value === '' || $value === 'all') {
                            continue;
                        }
                        $records->andWhere([$_field => $value]);
                        continue;
                    }

                    foreach ($value as $whe => $val) {
                        if (strtolower($whe) === 'between') {
                            $records->andWhere([$whe, $_field, reset($val), end($val)]);
                            continue;
                        } elseif (strtolower($whe) === 'exists') {
                            $records->andWhere([$whe, $val]);
                            continue;
                        }
                        $records->andWhere([$whe, $_field, $val]);
                        continue;
                    }
                }
            }
            if ($field === '') {
                $primaryKeys = self::primaryKey();
                $field = $primaryKeys[0];
            } else {
                $records->select($field);
            }
            if ($distinct) {
                $records->distinct();
            }
            return $records->count($field);
        }
        catch (\Exception $e) {
            return self::setAndReturn(ErrorCode::ERR_DATABASE_ERROR, $e->getTraceAsString() . '<br/>' . $e->getMessage() . '<br/>' . ',condition' . var_export($condition, true) . ',$field:' . var_export($field, true));
        }
    }

    /**
     * demo:
     *  in: ['column'=>['in'=>[1,2,3,4]]].
     *
     * 根据条件查询一列的和
     *
     * @param array $condition 查询条件
     * @param string $field 查询字段
     * @param boolean $distinct
     *
     * @return mixed
     */
    public function getSumByFieldCondition(array $condition, $field = 'id', $distinct = false)
    {
        $condition['del_state'] = self::DEL_STATE_NO;
        $modelClass = get_class($this);
        try {
            /**
             * @var ActiveQuery
             */
            $records = $modelClass::find();
            foreach ($condition as $_field => $value) {
                if ($_field === 'or') {
                    foreach ($value as $column => $vals) {
                        $whe = array_keys($vals)[0];
                        $val = array_values($vals)[0];
                        if (strtolower($whe) === 'between') {
                            $records->orWhere([$whe, $column, reset($val), end($val)]);
                            continue;
                        } elseif (strtolower($whe) === 'exists') {
                            $records->orWhere([$whe, $val]);
                            continue;
                        }
                        $records->orWhere([$whe, $column, $val]);
                        continue;
                    }
                } else {
                    if ($value instanceof ExpressionInterface) {
                        $records->andWhere($value, $value->params);
                        continue;
                    } elseif (!is_array($value)) {
                        if ($value === '' || $value === 'all') {
                            continue;
                        }
                        $records->andWhere([$_field => $value]);
                        continue;
                    }

                    foreach ($value as $whe => $val) {
                        if (strtolower($whe) === 'between') {
                            $records->andWhere([$whe, $_field, reset($val), end($val)]);
                            continue;
                        } elseif (strtolower($whe) === 'exists') {
                            $records->andWhere([$whe, $val]);
                            continue;
                        }
                        $records->andWhere([$whe, $_field, $val]);
                        continue;
                    }
                }
            }
            if ($field === '') {
                $primaryKeys = self::primaryKey();
                $field = $primaryKeys[0];
            } else {
                $records->select($field);
            }
            if ($distinct) {
                $records->distinct();
            }
            return $records->sum($field);
        }
        catch (\Exception $e) {
            return self::setAndReturn(ErrorCode::ERR_DATABASE_ERROR, $e->getTraceAsString() . '<br/>' . $e->getMessage() . '<br/>' . ',condition' . var_export($condition, true) . ',$field:' . var_export($field, true));
        }
    }

    /**
     * 批量更新
     * @param array $columns
     * @param string $condition
     * @param array $params
     * @return int|stringcreateCommand
     *
     */
    public function batchUpdateData(array $columns, $condition = '', $params = [])
    {
        try {
            return Yii::$app->db->createCommand()->update(self::tableName(), $columns, $condition, $params)->execute();
        }
        catch (\Exception $e) {
            return self::setAndReturn(ErrorCode::ERR_DATABASE_ERROR, $e->getMessage());
        }
    }

    /**
     * 根据数据库字段类型对查询结果进行数据类型转换
     * @param array $rows 查询结果二维数组
     * @return array 转换后的查询结果二维数组
     */
    public static function populate($rows)
    {
        if (empty ($rows)) {
            return [];
        }

        $result = [];

        $columns = static::getTableSchema()->columns;
        foreach ($rows as $row) {
            foreach ($row as $name => $value) {
                if (isset ($columns [$name])) {
                    $row [$name] = $columns [$name]->phpTypecast($value);
                }
            }
            $result[] = $row;
        }

        return $result;
    }

    /**
     * 设置是否将对返回结果进行强类型转换, true 是, false 否.
     * @param boolean $value true 是, false 否.
     */
    public function phpTypecast($value = true)
    {
        $this->_phpTypecast = $value;
    }
    
}
