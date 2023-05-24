<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\Repositories\ContactInterface as ContactRepositoryInterface;
use App\Repositories\ContactRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
