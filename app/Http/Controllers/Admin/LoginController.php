<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    #登录页的显示
    public function index(){
        return view("admin.login.index");
    }
    #登陆功能，使用auth登陆配置
    public function login(Request $request){
        $data = $this->validate($request,[
            "username"=>"required",
            "password"=>"required"
        ]);
        $boolean = auth()->attempt($data);
        #$boolean = auth()->guard("web")->attempt($data);    默认gaurd是web，可以省略不写

        dump(auth()->user());
    }
}
