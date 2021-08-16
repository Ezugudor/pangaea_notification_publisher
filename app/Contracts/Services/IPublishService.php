<?php

namespace App\Contracts\Services;

interface IPublishService
{
    public function publish(string $topic);
}
