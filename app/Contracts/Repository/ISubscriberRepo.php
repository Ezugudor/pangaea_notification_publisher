<?php

namespace App\Contracts\Repository;

use App\Contracts\IRepository;
use App\DTOs\CreateSubscriberDTO;

interface ISubscriberRepo extends IRepository
{
    public function create(CreateSubscriberDTO $detail);
    public function findByUrl(string $url);
}
