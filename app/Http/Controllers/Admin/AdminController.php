<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends BaseController
{
    public function index(Request $request){
        // $data = \App\Models\Admin::all();
        // $data = \App\Models\Admin::orderBy("id","desc")->paginate($this->page);
        #从env中拿到常量，方便以后更改
        $page = env("PAGESIZE");
        $data = \App\Models\Services\AdminService::search($request,4);
            return view("admin.admin.index",compact('data'));
    }
    public function create(){
        return view("admin.admin.create");
    }

    public function add(Request $request){
//        dd($request->all());
        $data = $this->validate($request,[
            "username"=>"required|unique:admins,username",
            "truename"=>"required",
            "email"=>"nullable|email",
            "password"=>"required|confirmed",
        ]);
        #$data['password'] = bcrypt($data['password']);
        #使用模型中的修改器来加密密码  两种都可以，但是因为控制器可以不用来执行多余的执行，就用来修改器来完成
        $model = \App\Models\Admin::create($data);
        return redirect(route("admin.user.index"))->with("success",'添加用户【'.$model->truename.'】成功');
    }
    public function edit(int $id){
        $data = \App\Models\Admin::find($id);
        return view("admin.admin.edit",compact('data'));
    }

    public function update(Request $request,int $id){
        $data = $this->validate($request,[
            "username"=>"required|unique:admins,username,".$id,
            "truename"=>"required",
            "email"=>"nullable|email",
            "password"=>"nullable|confirmed",
            "phone"=>"nullable|min:6"
        ]);
//        dd($data);
        if(empty($data['password'])){
            unset($data['password']);
        }
        $model = \App\Models\Admin::where("id",$id)->update($data);
        return redirect(route("admin.user.index"))->with("success",'修改用户【'.$data['truename'].'】成功');
    }

    public function delete(int $id){
        \App\Models\Admin::destroy($id);
        return ['code'=>200,'msg'=>'用户删除成功'];
    }

    public function destory(Request $request){
        $ids = $request->get("ids");
        $res = \App\Models\Admin::destroy($ids);
        if($res){
            return ['code'=>200,'msg'=>'用户批量删除成功'];
        }else{
            return ['code'=>203,'msg'=>'用户批量删除失败'];
        }
    }

    #恢复用户状态
    public function restore(Request $request){

        $res = \App\Models\Admin::where('id',$request->get('id'))->onlyTrashed()->restore();
        if($res){
            return ['code'=>200,'msg'=>'用户状态恢复成功'];
        }else{
            return ['code'=>203,'msg'=>'用户状态恢复失败'];
        }
    }
}
