<?php

namespace App\DTOs;


class CreateSubscriptionDTO extends BaseDTO
{
    public int $topic_id;
    public int $subscriber_id;



    public static function fromService(array $params)
    {
        return new self([
            'topic_id' => $params['topic_id'],
            'subscriber_id' => $params['subscriber_id'],
        ]);
    }
}
