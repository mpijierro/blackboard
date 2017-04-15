<?php

namespace Tests\Unit;

use Blackboard\Src\Validation\NotificationError;
use Blackboard\Src\Validation\Notificacion;
use Tests\TestCase;


class NotificationTest extends TestCase
{


    public function testInstanceNotification()
    {

        $notification = new Notificacion();
        $this->assertInstanceOf(Notificacion::class, $notification);
        $this->assertEquals(0, $notification->hasErrors());
    }


    public function testAddError()
    {

        $notification = new Notificacion();
        $error = new NotificationError('Error test');
        $notification->addError($error);

        $this->assertEquals(1, $notification->hasErrors());

    }

    public function testChainMessageInAString()
    {

        $notification = new Notificacion();
        $error = new NotificationError('Error test');
        $notification->addError($error);
        $error = new NotificationError('Second error test');
        $notification->addError($error);

        $this->assertEquals(2, $notification->hasErrors());
        $this->assertEquals('Error test Second error test', trim($notification->messages()));

    }

}