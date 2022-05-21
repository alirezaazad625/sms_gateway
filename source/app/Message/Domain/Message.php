<?php

namespace App\Message\Domain;

use App\Message\Domain\Commands\CreateMessageCommand;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public static function new(CreateMessageCommand $command): Message
    {
        $message = new Message();
        $message->phone = $command->getPhone();
        $message->message = $command->getMessage();
        $message->uuid = $command->getUuid();
        $message->created_at = time();
        return $message;
    }

    protected array $fillable = [
        'phone',
        'message',
        'id',
        'created_at'
    ];
}
