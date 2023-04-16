<?php

namespace App\Providers;

use App\Models\Module;
use App\Observers\ModuleObserver;
use App\View\Components\StudentSideMenuQuarter;
use Spatie\Flash\Flash;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
            'error' => 'alert-danger',
        ]);

        Paginator::useBootstrapFive();

        //observers
        Module::observe(ModuleObserver::class);

        Blade::component('quarter-side-menu', StudentSideMenuQuarter::class);
    }
}
