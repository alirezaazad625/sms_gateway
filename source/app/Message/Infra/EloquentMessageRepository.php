<?php


namespace App\Message\Infra;


use App\Jobs\MessagingWorker;
use App\Message\Application\Ports\MessageRepository;
use App\Message\Application\Ports\Pageable;
use App\Message\Domain\Message;
use Illuminate\Support\Facades\DB;
use Throwable;

class EloquentMessageRepository implements MessageRepository
{


    /**
     * @throws Throwable
     */
    function save(Message $message): void
    {
        $message->save();
        MessagingWorker::dispatch($message)->delay(now()->addSecond());
    }

    /**
     * @return Message[]
     */
    function find(int $page, int $pageSize): array
    {
        return Message::all()->forPage($page, $pageSize)->all();
    }
}
