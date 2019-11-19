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
        #做登陆成功之后的操作，判断是否有权限，先拿到当前登陆的角色模型
        $userModel = auth()->user();
        #通过关联模型(一对一，查出所属角色，在admin中规定属于role表的属于关系)进行查询，查询出当前用户所属角色，并且在关联权限表查询所拥有的权限有那些
        #正常的写法可以是 $userModel->role()->first()
        $rolemodel = $userModel->role;#这样的写法更简单，调用一个不存在的方法，会触发get，去拿取，并找到
        $nodeDatas = $rolemodel->nodes()->pluck("route_name",'id')->toArray();
        #过滤掉空字段,并且增序排序
        $nodeDatas = array_filter($nodeDatas);
        #定义不用验证的路由
        $noValidate = [
            'admin.index',
            'admin.logout',
        ];

        $nodeDatas = array_merge($nodeDatas,$noValidate);
        #获取当前请求的路由名，
        $currentRoteName = $request->route()->getName();
        #获取当前用户名，(admin不用做任何处理，超级用户拥有所有权限)
        $currentUserName = $userModel->username;
        #做是否可以访问的操作
//        dump($currentRoteName);
//        dd($nodeDatas);
        $request->auths = $nodeDatas;
        $request->username = $userModel->username;
        if(!in_array($currentRoteName,$nodeDatas) && $currentUserName != "admin"){
            exit("无权访问");
        }
        return $next($request);

    }
}
