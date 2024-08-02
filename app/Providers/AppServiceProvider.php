<?php

namespace App\Providers;

use App\Services\PetService;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Client::class, function ($app) {
            return new Client(['base_uri' => PetService::BASE_API_URL]);
        });
    }

    public function boot(): void
    {
    }
}
