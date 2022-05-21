<?php


namespace App\Message\Domain\Commands;


class CreateMessageCommand
{
    private string $uuid;
    private string $phone;
    private string $message;

    public function __construct(string $uuid, string $phone, string $message)
    {
        $this->uuid = $uuid;
        $this->phone = $phone;
        $this->message = $message;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
