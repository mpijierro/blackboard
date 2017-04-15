<?php

namespace Blackboard\Src\Validation;

abstract class NotificationMessage
{

    /**
     * @var string
     */
    private $message;

    public function __construct(string $message)
    {

        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }

}