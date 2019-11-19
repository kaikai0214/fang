<?php

namespace App\Models;

use App\Http\Requests\FangAttrRequest;
use App\Models\Traits\Btn;
use App\Observers\FangAttrObserber;
use Illuminate\Database\Eloquent\Model;

class FangAttr extends Base
{
    use Btn;
    protected $appends = ['actionBth'];

    public function getActionBthAttribute(){
        return $this->editBtn('admin.fangattr.edit').' '.$this->delBtn('admin.fangattr.destroy');
    }

    protected static function boot() {
        parent::boot();
        // 注册观察者
        self::observe(FangAttrObserber::class);
    }



}
