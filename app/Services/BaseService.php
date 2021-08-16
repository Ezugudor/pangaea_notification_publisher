<?php

namespace App\Services;

use App\Api\V1\Traits\HttpStatusResponse;

class BaseService
{
    use HttpStatusResponse;

    public function pruneSensitive($arr)
    {
        unset($arr['password']);
        return $arr;
    }
}
