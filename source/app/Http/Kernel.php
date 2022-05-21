<?php

namespace App\Http;

use App\Http\Middleware\Authenticate;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected array $middlewareGroups = [
        'api' => [
            Authenticate::class
        ],
    ];
}
