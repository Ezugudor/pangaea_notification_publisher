<?php

use App\Api\V1\Models\SubscriptionModel;
use Illuminate\Database\Seeder;

class SubscriptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SubscriptionModel::class, 10)->create();
    }
}
