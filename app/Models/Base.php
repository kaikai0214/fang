<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Base extends Model
{

    //引用片段，
    use SoftDeletes;
//    指定软删除字段
    protected  $dates = ['delete_at'];

    //设置黑名单
    protected  $guarded = [];
}
