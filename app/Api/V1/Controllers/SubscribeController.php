<?php


namespace App\Api\V1\Controllers;

use App\Contracts\Services\ISubscriptionService;
use App\Http\Request\SubscribeRequest;
use Illuminate\Http\Request;


class SubscribeController extends BaseController
{

    private $subscriptionService;

    public function __construct(ISubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }


    public function subscribe(Request $request, $topic, SubscribeRequest $subscribeRequest)
    {

        $validation = $subscribeRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details fill required fields.', $validation->errors());
            return $response_message;
        }

        return $this->subscriptionService->subscribe($topic);
    }
}
