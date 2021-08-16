<?php


namespace App\Api\V1\Controllers;

use App\Contracts\Services\IPublishService;
use App\Http\Request\PublishRequest;
use Illuminate\Http\Request;


class PublishController extends BaseController
{

    private $publishService;

    public function __construct(IPublishService $publishService)
    {
        $this->publishService = $publishService;
    }


    public function publish(Request $request, $topic, PublishRequest $publishRequest)
    {

        $validation = $publishRequest->validate($request);

        if ($validation->fails()) {
            $response_message = $this->customHttpResponse(400, 'Incorrect details fill required fields.', $validation->errors());
            return $response_message;
        }

        return $this->publishService->publish($topic);
    }
}
