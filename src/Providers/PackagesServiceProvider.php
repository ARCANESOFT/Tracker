<?php namespace Arcanesoft\Tracker\Providers;

use Arcanedev\LaravelTracker\LaravelTrackerServiceProvider;
use Arcanedev\Support\ServiceProvider;

/**
 * Class     PackagesServiceProvider
 *
 * @package  Arcanesoft\Tracker\Providers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class PackagesServiceProvider extends ServiceProvider
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->registerLaravelTrackerPackage();
    }

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Register Laravel Tracker package.
     */
    private function registerLaravelTrackerPackage()
    {
        $this->app->register(LaravelTrackerServiceProvider::class);

        /** @var \Illuminate\Contracts\Config\Repository  $config */
        $config = $this->app['config'];

        $config->set('laravel-tracker.database', $config->get('arcanesoft.tracker.database'));
        $config->set('laravel-tracker.models',   $config->get('arcanesoft.tracker.models'));
        $config->set('laravel-tracker.tracking', $config->get('arcanesoft.tracker.tracking'));
        $config->set('laravel-tracker.routes',   $config->get('arcanesoft.tracker.routes'));
    }
}
