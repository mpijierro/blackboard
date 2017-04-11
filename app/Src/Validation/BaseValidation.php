<?php

namespace Blackboard\Src\Validation;

use Illuminate\Support\Facades\Validator;

class BaseValidation
{

    protected $rules = [];

    protected $errors;


    public function validate($data)
    {

        $v = Validator::make($data, $this->rules);

        if ($v->fails()) {
            $this->errors = $v->errors();

            return false;
        }

        return true;
    }


    public function errors()
    {
        return $this->errors;
    }

}