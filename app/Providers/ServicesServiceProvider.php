<?php

namespace App\Providers;

use App\Contracts\Services\IPublishService;
use App\Contracts\Services\ISubscriptionService;
use App\Services\PublishService;
use App\Services\SubscriptionService;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Services

        $this->app->bind(ISubscriptionService::class, SubscriptionService::class);
        $this->app->bind(IPublishService::class, PublishService::class);
    }
}
