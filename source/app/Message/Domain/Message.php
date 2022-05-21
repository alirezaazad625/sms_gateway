<?php

namespace App\Message\Domain;

use App\Message\Domain\Commands\CreateMessageCommand;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function __construct(CreateMessageCommand $command)
    {
        $attributes = [
            'phone' => $command->getPhone(),
            'message' => $command->getMessage(),
            'id' => $command->getId(),
            'created_at' => time()
        ];
        parent::__construct($attributes);
    }

    protected array $fillable = [
        'phone',
        'message',
        'id',
        'created_at'
    ];
}
