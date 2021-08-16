<?php

namespace App\Services;

use App\Contracts\Repository\ISubscriptionRepo;
use App\Contracts\Repository\ITopicRepo;
use App\Contracts\Services\IPublishService;
use App\DTOs\CreateTopicDTO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Ixudra\Curl\Facades\Curl;



class PublishService extends BaseService implements IPublishService
{

    private $topicRepo;
    private $subRepo;


    public function __construct(Request $request, ITopicRepo $topicRepo,  ISubscriptionRepo $subRepo)
    {
        $this->topicRepo = $topicRepo;
        $this->subRepo = $subRepo;
        $this->suberEndpoint = $request->url;
    }



    public function publish(string $topic)
    {
        $dbTopic = $this->topicRepo->findByName($topic);
        $allTopicSubscribers = $this->subRepo->getTopicSubscribers($topic);

        if (!$dbTopic) { //if topic does not exist yet, create add it to our list of topics.
            $createTopicInputData = CreateTopicDTO::fromService(['topic' => $topic]);
            $this->topicRepo->create($createTopicInputData);
        }

        //if this topic has no subscriber, then dont stress the network.
        if (!$allTopicSubscribers) {
            $response_message = $this->customHttpResponse(200, 'Published successful - Although no subscriber was found.');
            return $response_message;
        }

        try {

            $payload = [
                'topic' => $topic,
                'data' => ['name' => 'udor']
            ];

            $result = [];

            foreach ($allTopicSubscribers as $topicSubscriber) {
                $subscriberEndpoint = $topicSubscriber->endpoint;
                $responseObj = Curl::to($subscriberEndpoint)
                    ->withData($payload)
                    ->asJson()
                    ->returnResponseObject()
                    ->post();

                if ($responseObj->status === 200) {
                    $result[] = [
                        'subscriber_endpoint' => $subscriberEndpoint,
                        'topic' => $topic,
                        'delivery_status' => 'success'
                    ];
                } else {
                    $result[] = [
                        'subscriber_endpoint' => $subscriberEndpoint,
                        'topic' => $topic,
                        'delivery_status' => 'failed'
                    ];
                }
            }



            $response_message = $this->customHttpResponse(200, 'Published successfully.', $result);
            return $response_message;
        } catch (\Throwable $th) {

            Log::info("Error contacting the subscribers: " . $th);
            $response_message = $this->customHttpResponse(401, 'Error contacting subscribers. Check your network connection.');
            return $response_message;
        }
    }
}
