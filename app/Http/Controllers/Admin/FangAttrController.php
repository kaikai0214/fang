<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FangAttrRequest;
use App\Models\FangAttr;
use Illuminate\Http\Request;

class FangAttrController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        #判断是ajax请求的操作时，就返回列表信息
        if($request->ajax()){
            $fangData = FangAttr::all()->toArray();
            $fangData = treeLevel($fangData);
            return $fangData;
        }
        return view('admin.fangattr.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fangData = FangAttr::pluck("id","name")->toArray();
        $fangData[0] = "______顶级______";
        ksort($fangData);
        return view('admin.fangattr.create',compact('fangData'));
    }

    /**
     * 使用独立验证器
     *
     */
    public function store(FangAttrRequest $request)
    {
        FangAttr::create($request->except(['_token','file']));
        return redirect(route('admin.fangattr.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FangAttr  $fangAttr
     * @return \Illuminate\Http\Response
     */
    public function show(FangAttr $fangAttr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FangAttr  $fangAttr
     * @return \Illuminate\Http\Response
     */
    public function edit(FangAttr $fangAttr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FangAttr  $fangAttr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FangAttr $fangAttr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FangAttr  $fangAttr
     * @return \Illuminate\Http\Response
     */
    public function destroy(FangAttr $fangAttr)
    {
        //
    }
}
