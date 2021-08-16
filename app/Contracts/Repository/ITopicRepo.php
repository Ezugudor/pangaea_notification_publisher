<?php

namespace App\Contracts\Repository;

use App\Contracts\IRepository;
use App\DTOs\CreateTopicDTO;

interface ITopicRepo extends IRepository
{
    public function create(CreateTopicDTO $details);
    public function findByName(string $topic);
}
