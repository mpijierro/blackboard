<?php

namespace Blackboard\Src\Validation;


class Notificacion
{

    private $errors;

    public function __construct()
    {
        $this->errors = collect();
    }

    public function addError(NotificationMessage $message)
    {

        $this->errors->push($message);

    }

    /**
     * @return mixed
     */
    public function getCause()
    {
        return $this->cause;
    }


    public function hasErrors()
    {
        return $this->errors->count();
    }

    public function errorMessage()
    {
        return $this->errors->first();
    }

    public function messages()
    {
        $message = '';
        foreach ($this->errors as $error) {
            $message .= $error->getMessage() . ' ';
        }

        return $message;
    }
}