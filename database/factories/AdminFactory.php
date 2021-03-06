<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Admin::class, function (Faker $faker) {
    return [
        'username'=>$faker->userName,
        'truename'=>$faker->name,
        /*加密admin    $2y$10$2RkOiZdwHVxRAi6adNDR2OT.QK3QHc8M4Ctsq00FvM2IZ79qZW5q2*/
        'password'=>bcrypt("admin"),
        'email'=>$faker->email,
        'phone'=>$faker->phoneNumber,
        'sex'=>['先生','女士'][rand(0,1)],
        'last_ip'=>'127.0.0.1',
    ];
});
