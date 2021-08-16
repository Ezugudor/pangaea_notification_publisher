<?php

namespace App\DTOs;


class CreateSubscriberDTO extends BaseDTO
{
    public string $url;

    public static function fromService(array $params)
    {
        return new self([
            'url' => $params['url'],
        ]);
    }
}
