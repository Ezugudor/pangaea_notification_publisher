<?php

namespace App\Http\Request;

use App\Contracts\FormRequest\IBaseRequest;

class PublishRequest extends BaseRequest implements IBaseRequest
{

    public function rules()
    {
        $rules = [];

        return $rules;
    }
}
