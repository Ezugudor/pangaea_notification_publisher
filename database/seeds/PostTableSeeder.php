<?php

use App\Api\V1\Models\PostModel;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PostModel::class, 10)->create();
    }
}
