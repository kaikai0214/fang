<?php

#as指的是路由组中的成员的别名前缀
Route::group(['namespace'=>"Admin","prefix"=>"admin","as"=>"admin."],function(){
    Route::get("login","LoginController@index")->name("login");
    Route::post("login","LoginController@login")->name("login");
});
