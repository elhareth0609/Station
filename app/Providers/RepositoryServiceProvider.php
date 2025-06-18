<?php

namespace App\Providers;

use App\Interfaces\CardRepositoryInterface;
use App\Interfaces\ClientRepositoryInterface;
use App\Interfaces\SimRepositoryInterface;
use App\Interfaces\StationRepositoryInterface;
use App\Interfaces\TransactionRepositoryInterface;

use App\Interfaces\UserRepositoryInterface;
use App\Repositories\CardRepository;
use App\Repositories\ClientRepository;
use App\Repositories\SimRepository;
use App\Repositories\StationRepository;

use App\Repositories\TransactionRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(CardRepositoryInterface::class, CardRepository::class);
        $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);
        $this->app->bind(SimRepositoryInterface::class, SimRepository::class);
        $this->app->bind(StationRepositoryInterface::class, StationRepository::class);
        $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);
    }
}
