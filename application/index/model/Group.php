<?php

namespace app\index\model;

use think\Model;
use think\db\Query;

class Group extends Model
{
     public function contacts()
    {
        return $this->belongsToMany('Contact', 'contactgroup');
    }
    
    public function getContactsArryAttr($contacts)
    {
        $relation = "contacts";
        $method   = \think\Loader::parseName("contacts", 1, false);
        $modelRelation = $this->$relation();
        // 不存在该字段 获取关联数据
        $list = $this->getRelationData($modelRelation);
        // 保存关联对象值
        // $contacts[] = $value
        $que = new Query();
        $tableName = "contact";
        $fields = $que->getTableInfo($tableName ?: (isset($que->options['table']) ? $que->options['table'] : ''), 'fields');
        unset($fields[0]);
        $fields = array_values($fields);
        $contacts[] = $fields;
        foreach ($list as $value)
        {
            unset($value->data['pivot']);
            unset($value->data['id']);
            $contacts[] = $value->data;
        }
        return $contacts;
    }
}