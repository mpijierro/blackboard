<?php

namespace Blackboard\Src\Post\Library;

use Blackboard\Src\Post\Actions\PostCommand;
use Blackboard\Src\Validation\BaseValidation;
use Illuminate\Validation\ValidationException;

class Validation extends BaseValidation
{

    protected $rules = [
        'title'   => 'required',
        'content' => 'required'
    ];


    public function validateCommand(PostCommand $command)
    {

        if ( ! $this->validate((array)$command)) {
            throw new ValidationException($this->errors());
        }

        $this->validateUser($command);

    }

    private function validateUser(PostCommand $command)
    {

        if (is_null($command->userId)) {
            $this->notificacion->addError($this->buildNotificationError('User is required.'));
        }

    }

}