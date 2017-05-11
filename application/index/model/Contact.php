<?php

namespace app\index\model;

use think\Model;

class Contact extends Model
{
    public function groups()
    {
        return $this->belongsToMany('Group', 'contactgroup');
    }

    public function getGroupsAttr($groups)
    {
        $relation = "groups";
        $method   = \think\Loader::parseName("groups", 1, false);
        $modelRelation = $this->$relation();
        // 不存在该字段 获取关联数据
        $list = $this->getRelationData($modelRelation);
        // 保存关联对象值
        foreach ($list as $value)
        {
            $groups[] = $value->data['name'];
        }
        $groups = implode(",", $groups);
        return $groups;
    }

    public function getDataAttr($data)
    {
        $this->data['groups'] = $this->groups;
        return $this->data;
    }
}