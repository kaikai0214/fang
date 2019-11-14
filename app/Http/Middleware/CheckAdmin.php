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
        return $next($request);

    }
}
