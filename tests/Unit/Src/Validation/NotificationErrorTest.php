<?php


namespace tests\Unit\Src\Validation;


use Blackboard\Src\Validation\NotificationError;
use Tests\TestCase;

class NotificationErrorTest extends TestCase
{

    public function testInstanceNotificationError()
    {

        $error = new NotificationError('Error test');
        $this->assertInstanceOf(NotificationError::class, $error);

    }

    public function testGetMessageCorrect()
    {

        $error = new NotificationError('Error test');
        $this->assertEquals('Error test', $error->getMessage());

    }

}