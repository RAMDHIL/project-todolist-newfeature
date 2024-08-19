<?php

namespace App\Providers;

use App\Services\Implementation\UserServiceImplementation;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public  array $singletons = [
        UserService::class => UserServiceImplementation::class
    ];
    public function provides(){
        return [UserService::class];
    }
    public function register()
    {
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
