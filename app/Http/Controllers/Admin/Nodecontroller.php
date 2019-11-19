<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Node;

class Nodecontroller extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Node::all()->toArray();
//        dd($data);
        $node = treeLevel($data);
        return view("admin.node.index",compact('node'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nodes = Node::where("pid",0)->pluck("name","id")->toArray();
        //在用户的最前面添加一个值；
        #这里不可以使用unshift，因为它会把原本的需要不可以改变的下表给从0开始排序了
//        array_unshift($nodes,"______顶级______");
        $nodes[0] = "______顶级______";
        ksort($nodes);
//        dd($nodes);
        return view("admin.node.create",compact('nodes'));
    }

    //权限添加操作
    public function store(Request $request)
    {
        $this->validate($request,[
           'name'=>'required'
        ]);
//        dd($request->all());
        $res = Node::create($request->except(['_token']));
        return redirect(route("admin.node.index"))->with("success","权限添加成功");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
