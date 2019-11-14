<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//邮箱用到的
use Mail;
use Illuminate\Mail\Message;

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

       $model = auth()->user();
        if(!$boolean){
            return redirect(route('admin.login'))->withErrors(['error'=>"账号或验证码错误"]);
        }

        //如果验证成功，往邮箱发送邮箱，
//        Mail::raw('登录成功', function (Message $message) {
////            $message->from('107413323@qq.com', 'Laravel');
//            $message->subject("登录成功通知");
//            $message->to(auth()->user()->email,'xiaoz');
//        });

//      记录世界，记录你
        $ip = $_SERVER["REMOTE_ADDR"];
        $time = date("Y-m-d H:i:s");
        Mail::send("admin.mail.blade",compact('model','ip','time'),function (Message $message) use ($model){
            $message->subject("登陆成功通知");
            $message->to($model->email,$model->truename);
        });


        $userinfo = \App\Models\Admin::find(auth()->user()->id);
        return redirect(route('admin.index',['id'=>auth()->user()->id]));
//        return redirect(route('admin.index',['id'=>auth()->user()->id]))->with('userinfo',$userinfo);
    }

}
