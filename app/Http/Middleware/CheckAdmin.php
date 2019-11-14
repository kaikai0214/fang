<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

//        echo "登陆了吗";
        if(!auth()->check()){
//            auth验证是否登陆，结果是true或false，进入判断说明没有登陆，就返回到登陆页面
            return redirect(route('admin.login'))->withErrors(['error'=>'请先登陆']);
        }
        #做登陆成功之后的操作，判断是否有权限，先拿到当前登陆的角色
        $username = auth()->user();
        #通过关联模型进行查询，查询出当前用户所属角色，并且在关联权限表查询所拥有的权限有那些
        $rolemodel = $username->role;
//        dd($rolemodel);
        $nodeDatas = $rolemodel->nodes()->pluck("name",'id')->toArray();


        return $next($request);

    }
}
