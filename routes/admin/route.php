<?php

#as指的是路由组中的成员的别名前缀
Route::group(['namespace'=>"Admin","prefix"=>"admin","as"=>"admin."],function(){
    Route::get("login","LoginController@index")->name("login");
    Route::post("login","LoginController@login")->name("login");

    //使用路由中间件的第二种绑定方式，一种是construct方式，控制器中的所有的方法都会，在单个路由中绑定的化，就是单个方法使用到
    #Route::get("index","Indexcontroller@index")->name("index")->middleware("checkadmin");

    //使用路由分组来绑定，
    Route::group(['middleware'=>["checkadmin"]],function(){
        Route::get("index","Indexcontroller@index")->name("index");
        Route::get("logout","Indexcontroller@logout")->name("logout");

        //==========================用户路由===============================================================
        //路由用户列表
        Route::get("user/index","AdminController@index")->name("user.index");
        //添加用户页面展示
        Route::get("user/create","AdminController@create")->name("user.create");
        //添加用户功能
        Route::post("user/create","AdminController@add")->name("user.add");
        //修改用户页面展示
        Route::get("user/edit/{id}","AdminController@edit")->name("user.edit");
        //修改用户功能
        Route::put("user/edit/{id}","AdminController@update")->name("user.update");
        //删除用户功能
        Route::delete("user/delete/{id}","AdminController@delete")->name("user.delete");
        //全选删除用户功能
        Route::delete("user/destory","AdminController@destory")->name("user.destory");
        //恢复用户状态功能
        Route::get("user/restore","AdminController@restore")->name("user.restore");

        //一直写单独路由很麻烦，使用资源路由
        //==========================角色资源路由===========================================================
        Route::resource("role","RoleController");
        //==========================角色资源路由===========================================================
        Route::resource("node","NodeController");
    });

});
