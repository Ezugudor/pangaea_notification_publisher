<?php

namespace App\Api\V1\Repositories\Eloquent;

use App\Api\V1\Models\SubscriberModel;
use App\Api\V1\Repositories\EloquentRepository;
use App\Contracts\Repository\ISubscriberRepo;
use App\DTOs\CreateSubscriberDTO;

class SubscriberEloquentRepository extends  EloquentRepository implements ISubscriberRepo
{

    public $subscriberModel;
    public function __construct(SubscriberModel $subscriberModel)
    {
        parent::__construct();
        $this->subscriberModel =  $subscriberModel;
    }

    public function model()
    {
        return SubscriberModel::class;
    }

    public function create(CreateSubscriberDTO $details)
    {
        //convert POPO to array for the create() quick wrapper below
        $details =  json_decode(json_encode($details), true);
        $res = $this->subscriberModel->create($details);

        return $res;
    }


    public function findByUrl(string $endpoint)
    {
        return  $this->subscriberModel->where('url', $endpoint)->first();
    }
}
