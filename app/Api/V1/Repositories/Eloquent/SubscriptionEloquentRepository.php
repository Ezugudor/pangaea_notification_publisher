<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\SubscriptionModel;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\ISubscriptionRepo;
use App\DTOs\CreateSubscriptionDTO;

class SubscriptionEloquentRepository extends  EloquentRepository implements ISubscriptionRepo
{

    public $subscriptionModel;
    public function __construct(SubscriptionModel $subscriptionModel)
    {
        parent::__construct();
        $this->subscriptionModel =  $subscriptionModel;
    }

    public function model()
    {
        return SubscriptionModel::class;
    }

    public function create(CreateSubscriptionDTO $details)
    {
        //convert POPO to array for the create() quick wrapper below
        $details =  json_decode(json_encode($details), true);
        $res = $this->subscriptionModel->create($details);

        return $res;
    }

    public function getTopicSubscribers(string $topic)
    {

        $res = $this->subscriptionModel->from('subscriptions as sub')
            ->select('suber.url as endpoint')
            ->leftJoin('subscribers as suber', 'sub.subscriber_id', 'suber.id')
            ->leftJoin('topics as t', 'sub.topic_id', 't.id')
            ->withTrashed()
            ->where('t.name', $topic)
            ->get();
        return $res;
    }

    public function checkSubscriptionStatus(string $topic, string $subscriberEndpoint)
    {

        $res = $this->subscriptionModel->from('subscriptions as sub')
            ->select('sub.id')
            ->leftJoin('subscribers as suber', 'sub.subscriber_id', 'suber.id')
            ->leftJoin('topics as t', 'sub.topic_id', 't.id')
            ->withTrashed()
            ->where('t.name', $topic)
            ->where('suber.url', $subscriberEndpoint)
            ->first();
        return $res;
    }
}
