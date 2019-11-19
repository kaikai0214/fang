<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected $page = 0;
    public function __construct()
    {
//      var_dump(env('PAGES'));
        $this->page = env("PAGES");
    }

    public function upfile(Request $request){
        $nodeName = $request->get('node');
        $file = $request->file('file');
        #第一个参数是创建新目录，可以为空，不创建，第二个参数是从配置文件中读取值
        $uri = $file->store('',$nodeName);
        return ['code'=>200,'url'=>"/uploads/".$nodeName.'/'.$uri];
    }
}
