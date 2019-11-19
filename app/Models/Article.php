<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Btn;
class Article extends Base
{
    use Btn;
    protected $appends = ['actionBth'];
    public function cate(){
        return $this->belongsTo(Cate::class,'cid');
    }

    public function getActionBthAttribute(){
        return $this->editBtn('admin.article.edit').' '.$this->delBtn('admin.article.destroy');
    }
}
