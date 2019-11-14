<?php

namespace App\Models\Services;
use Illuminate\Http\Request;

class AdminService
{
    public static function search(Request $request,int $pagesize){
        $kw = $request->get("kw");
        return \App\Models\Admin::when($kw,function ($query) use ($kw){
            $query->where("username","like","%{$kw}%");
        })->orderBy("id","desc")->withTrashed()->paginate($pagesize);
    }
}
