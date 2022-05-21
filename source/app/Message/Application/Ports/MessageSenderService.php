<?php


namespace App\Message\Application\Ports;


interface MessageSenderService
{
    function send(string $receiver, string $message);
}
