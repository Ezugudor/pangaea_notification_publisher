<?php

namespace App\Http\Request;

use Illuminate\Support\Facades\Validator;

abstract class BaseRequest
{

    public $valid = false;

    abstract public function rules();


    /**
     * @param object $request the http request payload from controller.
     * @return this an instance of this class.
     */
    public function validate($request)
    {
        $validator = Validator::make(
            $request->input(),
            $this->rules()
        );


        if ($validator->fails()) {
            $this->valid = true;
        }
        return $validator;
    }

    /**
     * @return bool wether this validation fails or passes.
     */
    public function fails()
    {
        return $this->valid;
    }
}
