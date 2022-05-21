<?php


namespace App\Providers;


use App\Message\Application\MessagesApplication;
use App\Message\Application\Ports\MessageRepository;
use App\Message\Application\Ports\MessageSenderService;
use App\Message\Infra\EloquentMessageRepository;
use App\Message\Infra\GhasedakSmsSender;
use App\Message\Infra\KavenegarSmsSender;
use App\Message\Infra\MockSmsSender;
use Carbon\Laravel\ServiceProvider;
use Ghasedak\GhasedakApi;
use Kavenegar\KavenegarApi;

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

        $this->app->singleton(
            MessageSenderService::class,
            function (): MessageSenderService {
                switch (env('MESSAGE_PROVIDER')) {
                    case 'kavenegar':
                        return new KavenegarSmsSender(
                            $this->app->make(KavenegarApi::class),
                            env('MESSAGE_PROVIDER_SENDER')
                        );
                    case 'ghasedak':
                        return new GhasedakSmsSender($this->app->make(GhasedakApi::class));
                    default:
                        return new MockSmsSender();
                }
            }
        );

        $this->app->singleton(
            KavenegarApi::class,
            function (): KavenegarApi {
                return new KavenegarApi(env('MESSAGE_PROVIDER_API_KEY'));
            }
        );

        $this->app->singleton(
            GhasedakApi::class,
            function (): GhasedakApi {
                return new GhasedakApi(env('MESSAGE_PROVIDER_API_KEY'));
            }
        );
    }
}
