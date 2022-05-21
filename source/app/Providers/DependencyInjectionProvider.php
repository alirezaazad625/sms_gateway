<?php


namespace App\Providers;


use App\Message\Application\MessagesApplication;
use App\Message\Application\Ports\MessageRepository;
use Carbon\Laravel\ServiceProvider;
use App\Message\Infra\EloquentMessageRepository;

class DependencyInjectionProvider extends ServiceProvider
{
    function boot()
    {
        $this->app->singleton(
            MessageRepository::class,
            EloquentMessageRepository::class
        );

        $this->app->singleton(
            MessagesApplication::class,
            function (): MessagesApplication {
                return new MessagesApplication($this->app->make(MessageRepository::class));
            }
        );
    }
}
