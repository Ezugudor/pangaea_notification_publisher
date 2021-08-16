<?php

use App\Api\V1\Models\TopicModel;
use Illuminate\Database\Seeder;

class TopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TopicModel::class, 10)->create();
    }
}
