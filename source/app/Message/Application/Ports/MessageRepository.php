<?php


namespace App\Message\Application\Ports;

use App\Message\Domain\Message;

interface MessageRepository
{
    function save(Message $message);

    /**
     * @return Message[]
     */
    function find(int $page , int $pageSize) : array;
}
