<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #执行此seed填充文件时会先清除数据库再进行填充数据，如果想叠加数据，则不需要
        Admin::truncate();

        factory(Admin::class,10)->create();

        #控制生成的数据第4是我们想要的admin用户名和
        Admin::where("id",4)->update(["username"=>'admin']);
    }
}
