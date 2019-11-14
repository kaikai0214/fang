<?php

namespace App\Models;

class Role extends Base
{
//    多对多关联模型
    public function nodes(){
        return $this->belongsToMany(Node::class,'role_node','role_id','node_id');
    }
}
