<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\User;
use App\Policies\CartPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define(
            "gestionar-productos",
            fn(User $u) => $u->role === "admin"
        );
    }
}
