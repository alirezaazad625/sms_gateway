<?php


namespace App\Message\Infra;


use App\Message\Application\Ports\MessageSenderService;

class MockSmsSender implements MessageSenderService
{

    function send(string $receiver, string $message)
    {
    }
}
