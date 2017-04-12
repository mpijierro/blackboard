<?php

namespace Blackboard\Src\Validation;

use Illuminate\Support\Facades\Validator;

class BaseValidation
{
    protected $rules = [];

    protected $errors;

    protected $validator = null;


    public function getRules()
    {
        return $this->rules;
    }


    public function errors()
    {
        return $this->errors;
    }

    public function getValidatorOrNull()
    {
        return $this->validator;
    }

    public function validate($data)
    {

        $this->validator = Validator::make($data, $this->rules);

        if ($this->validator->fails()) {
            $this->errors = $this->validator->errors();

            return false;
        }

        return true;
    }

}