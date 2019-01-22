<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    
    return [
        //
        'title' => $this->faker->sentence,
        'description'  => $this->faker->paragraph,

        'owner_id' => function (){

            return factory(App\User::class)->create()->id;

        }

    ];
});
