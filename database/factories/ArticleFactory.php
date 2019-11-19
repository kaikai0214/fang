<?php

use Faker\Generator as Faker;
use App\Models\Article;
$factory->define(Article::class, function (Faker $faker) {
    return [
        "cid"=>mt_rand(2,5),
        "title"=>$faker->sentence(),
        "desn"=>$faker->sentence(),
        "pic"=>"/uploads/article/0E1AE67E1F833B8AD9D8A44393BC7572.JPG",
        'body'=>$faker->text()
    ];
});
