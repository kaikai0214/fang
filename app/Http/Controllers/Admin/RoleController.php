<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Node;

class RoleController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new Role();
        $role_data = $model->paginate(4);
        return view("admin.role.index",compact('role_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nodes = Node::all()->toArray();
        $nodes_list = treeLevel($nodes);
//        dd($nodes_list);
        return view("admin.role.create",compact('nodes_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request,[
           'name'=>"required|unique:roles,name"
//            表示roles表中的name字段不可重复
        ]);
        $res = Role::create($data);
//        dd($res->nodes());
//        dd($request->get('node_ids'));
        $res->nodes()->sync($request->get('node_ids'));
        return redirect(route("admin.role.index"))->with("success",'添加用户成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $nodes = Node::all()->toArray();
        $nodes_list = treeLevel($nodes);

        $role_node = $role->nodes()->pluck("id")->toArray();
//       dd($role->nodes());
        return view('admin.role.edit',compact("role",'nodes_list','role_node'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $data = $this->validate($request,[
           'name'=>"required|unique:roles,name,".$role->id
        ]);
//        dd($role);
        $role->update($data);
        $role->nodes()->sync($request->get("node_ids"));
        return redirect(route("admin.role.index"))->with("success",'修改角色操作成功');
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
