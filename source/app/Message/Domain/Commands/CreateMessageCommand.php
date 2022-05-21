<?php


namespace App\Message\Domain\Commands;


class CreateMessageCommand
{
    private string $id;
    private string $phone;
    private string $message;

    public function __construct(string $id, string $phone, string $message)
    {
        $this->id = $id;
        $this->phone = $phone;
        $this->message = $message;
    }

    public function getId(): string
    {
        return $this->id;
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
