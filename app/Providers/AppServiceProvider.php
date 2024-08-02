<?php

declare(strict_types=1);

namespace App\Providers;

use App\Contracts\PetServiceInterface;
use App\Services\HttpRequestService;
use App\Services\PetService;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use Psr\Log\LoggerInterface;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Client::class, fn() => new Client(['base_uri' => PetService::BASE_API_URL]));

        $this->app->singleton(HttpRequestService::class, function ($app) {
            return new HttpRequestService($app->make(Client::class), $app->make(LoggerInterface::class));
        });

        $this->app->singleton(PetServiceInterface::class, PetService::class);
    }

    public function boot(): void
    {
    }
}
