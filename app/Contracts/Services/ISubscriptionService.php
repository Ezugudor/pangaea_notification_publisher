<?php

namespace App\Contracts\Services;

interface ISubscriptionService
{
    public function subscribe(string $topic);
}
