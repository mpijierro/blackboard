<?php

namespace Blackboard\Src\Validation;

use Illuminate\Support\Facades\Validator;
use Blackboard\Src\Validation\Notificacion;

abstract class BaseValidation
{
    protected $rules = [];

    protected $errors;

    protected $validator = null;

    /**
     * @var Notificacion
     */
    protected $notificacion;

    public function __construct(Notificacion $notificacion)
    {
        $this->notificacion = $notificacion;
    }


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

    public function getNotification()
    {
        return $this->notificacion;
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


    protected function buildNotificationError($message)
    {
        return app(NotificationError::class, ['message' => $message]);
    }

}