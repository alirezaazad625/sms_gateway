<?php


namespace Message\Infra;


use App\Message\Application\Ports\MessageRepository;
use App\Message\Application\Ports\Pageable;
use App\Message\Domain\Message;
use Throwable;

class EloquentMessageRepository implements MessageRepository
{

    /**
     * @throws Throwable
     */
    function save(Message $message)
    {
        $message->saveOrFail();
    }

    function find(Pageable $pageable = null): array
    {
        // TODO: Implement find() method.
    }
}
