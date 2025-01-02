<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\CarRepositoryInterface;
use App\Repositories\CarRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CarRepositoryInterface::class, CarRepository::class);
    }
}
