<?php

use App\Api\V1\Models\SubscriberModel;
use Illuminate\Database\Seeder;

class SubscriberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SubscriberModel::class, 10)->create();
    }
}
