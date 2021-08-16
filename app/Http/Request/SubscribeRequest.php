<?php

namespace App\Http\Request;

use App\Contracts\FormRequest\IBaseRequest;

class SubscribeRequest extends BaseRequest implements IBaseRequest
{

    public function rules()
    {
        $rules = [
            'url' => 'required | string | url',
        ];

        return $rules;
    }
}
