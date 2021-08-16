<?php

namespace App\Providers;

use App\Api\V1\Repositories\Eloquent\SubscriberEloquentRepository;
use App\Api\V1\Repositories\Eloquent\SubscriptionEloquentRepository;
use App\Api\V1\Repositories\Eloquent\TopicEloquentRepository;
use App\Contracts\Repository\ISubscriberRepo;
use App\Contracts\Repository\ISubscriptionRepo;
use App\Contracts\Repository\ITopicRepo;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Repositories

        $this->app->bind(ISubscriberRepo::class, SubscriberEloquentRepository::class);
        $this->app->bind(ISubscriptionRepo::class, SubscriptionEloquentRepository::class);
        $this->app->bind(ITopicRepo::class, TopicEloquentRepository::class);
    }
}
