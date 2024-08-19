<?php

namespace App\Providers;

use App\Services\Implementation\TodoListServiceImplementation;
use App\Services\TodoListService;
use Illuminate\Support\ServiceProvider;

class TodolistServiceProvider extends ServiceProvider
{   
    public array $singletons = [
        TodoListService::class => TodoListServiceImplementation::class
    ];
    public function provides(){
        return [TodoListService::class];
    }
    public function register()
    {
        //
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
