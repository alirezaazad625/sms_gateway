<?php

namespace App\Jobs;

use App\Message\Application\Ports\MessageSenderService;
use App\Message\Domain\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MessagingWorker implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Message $message;

    public int $tries = 2;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function handle(MessageSenderService $messageSenderService): void
    {
        $messageSenderService->send($this->message->phone, $this->message->message);
    }

    public function backoff()
    {
        return env('JOB_RETRY_DELAY');
    }

}
