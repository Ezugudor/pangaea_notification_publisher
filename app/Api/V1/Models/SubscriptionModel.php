<?php

namespace  App\Api\V1\Models;

class SubscriptionModel extends BaseModel
{
    protected $table = "subscriptions";

    // protected $with = [
    //     "topic:id,name",
    //     "subscriber:id,url",
    // ];

    // public function topic()
    // {
    //     return $this->belongsTo(TopicModel::class, 'topic_id');
    // }

    // public function subscriber()
    // {
    //     return $this->belongsTo(SubscriberModel::class, 'subscriber_id');
    // }
}
