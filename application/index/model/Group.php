<?php

namespace app\index\model;

use think\Model;

class Group extends Model
{
     public function contacts()
    {
        return $this->belongsToMany('Contact', 'contactgroup');
    }
}