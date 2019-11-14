<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\models\Node;
class Role extends Model
{
    protected $guarded = [];

//    多对多关联模型
    public function nodes(){
//        return $this->belongsToMany(Node::class,'role_node',"role_id","node_id");
        return $this->belongsToMany(Node::class,'role_node','role_id','node_id');
    }
}
