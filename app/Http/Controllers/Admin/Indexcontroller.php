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
        return view("admin.index.index");
    }
    public function logout(){
        #退出的就是清除session，使用auth的方法来退出
        auth()->logout();
        #使用闪存来提示信息，闪存的概念是，在页面第一次加载时会带入
        return redirect(route('admin.login'))->with('success','退出成功');
    }
}
