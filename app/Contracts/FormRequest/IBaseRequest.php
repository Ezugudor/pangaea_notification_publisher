<?php

namespace App\Contracts\FormRequest;


interface IBaseRequest
{
    public function validate($request);
    public function fails();
}
