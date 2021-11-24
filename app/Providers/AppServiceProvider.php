<?php

namespace App\Providers;
use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Model::unguard();

        Gate::define('admin', function (User $user) {
            return $user->username === 'Jwick';
        });

        Blade::if('admin', function () {
            return request()->user()?->can('admin');
        });
    }
}
