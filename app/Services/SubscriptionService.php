<?php

namespace App\Services;

use App\Contracts\Repository\ISubscriberRepo;
use App\Contracts\Repository\ISubscriptionRepo;
use App\Contracts\Repository\ITopicRepo;
use App\Contracts\Services\ISubscriptionService;
use App\DTOs\CreateSubscriberDTO;
use App\DTOs\CreateSubscriptionDTO;
use App\DTOs\CreateTopicDTO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class SubscriptionService extends BaseService implements ISubscriptionService
{

    private $topicRepo;
    private $subscriberRepo;
    private $subRepo;


    public function __construct(Request $request, ITopicRepo $topicRepo, ISubscriberRepo $subscriberRepo, ISubscriptionRepo $subRepo)
    {
        $this->topicRepo = $topicRepo;
        $this->subscriberRepo = $subscriberRepo;
        $this->subRepo = $subRepo;
        $this->suberEndpoint = $request->url;
    }



    public function subscribe(string $topic)
    {

        $isAlreadySubscribed = $this->subRepo->checkSubscriptionStatus($topic, $this->suberEndpoint);

        if ($isAlreadySubscribed) {
            $response_message = $this->customHttpResponse(200, 'The endpoint provided has already subscribed to this topic.');
            return $response_message;
        }


        $dbTopic = $this->topicRepo->findByName($topic);

        DB::beginTransaction();
        try {

            if (!$dbTopic) { //if topic does not exist yet, create new and get the ID else get the ID of the existing topic and subscribe to it.

                $createTopicInputData = CreateTopicDTO::fromService(['topic' => $topic]);
                $newTopic = $this->topicRepo->create($createTopicInputData);
                $newTopicID = $newTopic->id;
            } else {
                $newTopicID = $dbTopic->getOriginal('id');
            }


            $createSuberInputData = CreateSubscriberDTO::fromService(['url' => $this->suberEndpoint]);
            $newSubscriber = $this->subscriberRepo->create($createSuberInputData);
            $newSubscriberID = $newSubscriber->id;

            $createSubInputData = CreateSubscriptionDTO::fromService([
                'topic_id' => $newTopicID,
                'subscriber_id' => $newSubscriberID,
            ]);
            $this->subRepo->create($createSubInputData);


            DB::commit();


            $resData = ['url' => $this->suberEndpoint, 'topic' => $topic];
            $response_message = $this->customHttpResponse(200, 'Subscription successful.', $resData);
            return $response_message;
        } catch (\Throwable $th) {

            DB::rollBack();
            Log::info("One of the DB statements failed. Error: " . $th);

            $response_message = $this->customHttpResponse(500, 'Transaction Error adding subscription.');
            return $response_message;
        }
    }
}
