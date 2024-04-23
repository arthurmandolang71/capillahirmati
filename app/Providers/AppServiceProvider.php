<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
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
        //
        Paginator::useBootstrapFive();

        Gate::define('isPaarsel', function (User $user) {
            return $user->level == 1 or $user->level == 2
                or $user->level == 3
                or $user->level == 4
                or $user->level == 10;
        });

        Gate::define('isPN', function (User $user) {
            return $user->level == 5;
        });

        Gate::define('isAdmin', function (User $user) {
            return $user->level == 10;
        });


        Gate::define('profil', function () {
            return request()->segment(2) == request()->session()->get('user_id');
        });
    }
}
