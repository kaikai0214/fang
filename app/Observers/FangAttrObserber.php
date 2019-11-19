<?php

namespace App\Observers;
use App\Models\FangAttr;

class FangAttrObserber{
    /**
     *观察者，在使用create进行数据库操作时才会触发   意思是创建时
     */
    public function creating(FangAttr $fangAttr)
    {
        #在接收到参数并进行create添加数据库的操作时，把其中的参数进行改变，
        $filed_name = request()->get('field_name');
        $icon = request()->get('icon');
        $fangAttr->field_name = $filed_name == null ? '' : $filed_name;
        $fangAttr->icon = $icon == null ? 1 : $icon;
//        dd($fangAttr);
    }

    /**
     * Handle the fang attr "updated" event.
     *
     * @param  \App\Models\FangAttr  $fangAttr
     * @return void
     */
    public function updated(FangAttr $fangAttr)
    {
        //
    }

    /**
     * Handle the fang attr "deleted" event.
     *
     * @param  \App\Models\FangAttr  $fangAttr
     * @return void
     */
    public function deleted(FangAttr $fangAttr)
    {
        //
    }

    /**
     * Handle the fang attr "restored" event.
     *
     * @param  \App\Models\FangAttr  $fangAttr
     * @return void
     */
    public function restored(FangAttr $fangAttr)
    {
        //
    }

    /**
     * Handle the fang attr "force deleted" event.
     *
     * @param  \App\Models\FangAttr  $fangAttr
     * @return void
     */
    public function forceDeleted(FangAttr $fangAttr)
    {
        //
    }
}
