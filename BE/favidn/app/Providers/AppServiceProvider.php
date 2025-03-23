<?php

namespace App\Providers;

use App\Http\Services\AUTH\RegisterService;
use App\Models\Repository\AUTH\RegisterRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        RegisterService::class => RegisterRepository::class
    ];

    public function register(): void
    {

    }

    public function boot(): void
    {
        //
    }
}
