<?php

namespace App\Providers;

use App\Models\Module;
use App\Observers\ModuleObserver;
use Spatie\Flash\Flash;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

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
        Model::unguard();

        Flash::levels([
            'success' => 'alert-success',
            'warning' => 'alert-warning',
            'error' => 'alert-error',
        ]);

        Paginator::useBootstrapFive();

        //observers
        Module::observe(ModuleObserver::class);
    }
}
