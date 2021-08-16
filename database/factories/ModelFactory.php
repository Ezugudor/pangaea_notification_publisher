<?php

use App\Api\V1\Models\PostModel;
use App\Api\V1\Models\SubscriberModel;
use App\Api\V1\Models\SubscriptionModel;
use App\Api\V1\Models\TopicModel;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
/**
 * Notice that some models below were declared but not used, especially the TYPES
 * because their data were explicitly defined in their individual seeding files.
 */


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/



$factory->define(TopicModel::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->word,
        'created_at' => $faker->dateTimeThisYear($max = '+1 year')->format('Y-m-d H:i:s'),
    ];
});

$factory->define(SubscriptionModel::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'topic_id' => $faker->randomElement($array = array(1, 2, 3, 4, 5)),
        'subscriber_id' => $faker->randomElement($array = array(1, 2, 3, 4, 5)),
        'created_at' => $faker->dateTimeThisYear($max = '+1 year')->format('Y-m-d H:i:s'),
    ];
});

$factory->define(SubscriberModel::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'url' => $faker->url,
        'created_at' => $faker->dateTimeThisYear($max = '+1 year')->format('Y-m-d H:i:s'),
    ];
});

$factory->define(PostModel::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'topic_id' => $faker->randomElement($array = array(1, 2, 3, 4, 5)),
        'message' => $faker->realText($maxNbChars = 100, $indexSize = 2),
        'created_at' => $faker->dateTimeThisYear($max = '+1 year')->format('Y-m-d H:i:s'),
    ];
});
