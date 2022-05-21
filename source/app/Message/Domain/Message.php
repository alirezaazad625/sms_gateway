<?php

namespace App\Message\Domain;

use Illuminate\Database\Eloquent\Model;
use Throwable;

class Message extends Model
{
    public function __construct(string $uuid, string $phone, string $message)
    {
        $attributes = [
            'phone' => $phone,
            'message' => $message,
            'id' => $uuid,
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

    /**
     * @throws Throwable
     */
    static function saveOrThrow(Message $message) : void
    {
        $message->saveOrFail();
    }
}
