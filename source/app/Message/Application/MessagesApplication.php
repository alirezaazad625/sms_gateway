<?php


namespace App\Message\Application;


use App\Message\Application\Ports\MessageRepository;
use App\Message\Domain\Commands\CreateMessageCommand;
use App\Message\Domain\Message;

class MessagesApplication
{
    private MessageRepository $messageRepository;

    public function __construct(MessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    public function create(CreateMessageCommand $command)
    {
        $message = Message::new($command);
        $this->messageRepository->save($message);
    }


}
