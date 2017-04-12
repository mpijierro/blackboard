<?php

namespace Blackboard\Src\Post\Library;

use Blackboard\Src\Validation\CustomValidationException;
use Blackboard\Src\Post\Command\PostCommand;
use Blackboard\Src\Validation\BaseValidation;
use Illuminate\Validation\ValidationException;

class Validation extends BaseValidation
{

    protected $rules = [
        'title'   => 'required',
        'content' => 'required'
    ];


    /**
     * @return array
     */
    public function getRules()
    {
        return $this->rules;
    }


    public function validateCommand(PostCommand $command)
    {

        if ( ! $this->validate((array)$command)) {
            throw new ValidationException($this->errors());
        }

        // Business logic validation
        if (is_null($command->userId)) {
            throw new CustomValidationException ('User is required');
        }

    }

}