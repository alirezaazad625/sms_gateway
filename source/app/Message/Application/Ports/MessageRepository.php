<?php


namespace App\Message\Application\Ports;

use App\Message\Domain\Message;

interface MessageRepository
{
    function save(Message $message);

    /**
     * @param Pageable|null $pageable
     * @return Message[]
     */
    function find(Pageable $pageable = null) : array;
}
