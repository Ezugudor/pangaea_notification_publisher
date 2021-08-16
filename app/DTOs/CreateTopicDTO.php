<?php

namespace App\DTOs;


class CreateTopicDTO extends BaseDTO
{
    public string $name;

    public static function fromService(array $params)
    {
        return new self([
            'name' => $params['topic'],
        ]);
    }
}
