<?php

namespace App\Contracts\Repository;

use App\Contracts\IRepository;
use App\DTOs\CreateSubscriptionDTO;

interface ISubscriptionRepo extends IRepository
{
    public function create(CreateSubscriptionDTO $detail);
    public function getTopicSubscribers(string $topic);
    public function checkSubscriptionStatus(string $topic, string $subscriberEndpoint);
}
