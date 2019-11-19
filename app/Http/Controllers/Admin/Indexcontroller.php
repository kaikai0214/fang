<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Indexcontroller extends Controller
{
//    public function __construct()
//    {
//        $this->middleware("checkadmin");
//    }

    public function index(Request $request){
        #根据角色表属于用户表的关联模型拿到当前角色
        $rolemodel = auth()->user()->role;
        #根据当前角色模型进行多对多的权限表进行关联查询(查询是菜单显示的数据)
//        $ndoemodel = $rolemodel->nodes()->where('is_menu','1')->get(['id','name','pid','route_name'])->toArray();
        $nodeData = $rolemodel->nodes()->where('is_menu','1')->get(['id','pid','name','route_name'])->toArray();
        $ndoe = subTree($nodeData);
//        dd($ndoe);
//        return view("admin.index.index",compact('ndoe'));
        return view("admin.index.index");
    }
    public function logout(){
        #退出的就是清除session，使用auth的方法来退出
        auth()->logout();
        #使用闪存来提示信息，闪存的概念是，在页面第一次加载时会带入
        return redirect(route('admin.login'))->with('success','退出成功');
    }
}
