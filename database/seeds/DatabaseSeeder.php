<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('TopicTableSeeder');

        $this->call('SubscriberTableSeeder');

        $this->call('SubscriptionTableSeeder');

        $this->call('PostTableSeeder');
    }
}
