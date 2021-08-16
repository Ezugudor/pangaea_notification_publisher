<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\TopicModel;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\ITopicRepo;
use App\DTOs\CreateTopicDTO;

class TopicEloquentRepository extends  EloquentRepository implements ITopicRepo
{

    public $topicModel;
    public function __construct(TopicModel $topicModel)
    {
        parent::__construct();
        $this->topicModel =  $topicModel;
    }

    public function model()
    {
        return TopicModel::class;
    }

    public function create(CreateTopicDTO $details)
    {
        //convert POPO to array for the create() quick wrapper below
        $details =  json_decode(json_encode($details), true);
        $res = $this->topicModel->create($details);

        return $res;
    }

    public function findByName(string $topic)
    {
        return  $this->topicModel->where('name', $topic)->first();
    }
}
