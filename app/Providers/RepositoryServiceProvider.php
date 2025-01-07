<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\CarRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Repositories\CarRepository;
use App\Repositories\CategoryRepository;

class RepositoryServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(CarRepositoryInterface::class, CarRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
    }
}
