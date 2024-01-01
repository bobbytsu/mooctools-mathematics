<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'QuestionLevel' => 'Kindergarten',
        'Question' => $faker->sentence,
        'Answer' => $faker->randomDigitNotNull,
    ];
});
