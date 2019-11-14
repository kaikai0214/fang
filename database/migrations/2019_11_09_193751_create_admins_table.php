<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id')->commit("用户自增id");
            $table->unsignedBigInteger("role_id")->default(1)->comment("角色id");
            $table->string("username",50)->commit("账号");
            $table->string("truename",50)->default("未知")->commit("用户名");
            $table->string("password",255)->commit("用户密码");
            /*nullable代表可以为空*/
            $table->string("email",50)->nullable()->commit("用户邮箱");
            $table->string("phone",15)->default('')->commit("用户手机号");
            $table->enum("sex",['先生','女士'])->default('先生')->commit("性别");
            $table->char('last_ip',15)->default('')->commit("登陆ip");

            $table->timestamps();
            $table->rememberToken();
            #代表软删除  生成一个 delete_at字段
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
