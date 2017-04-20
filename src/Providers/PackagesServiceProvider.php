<?php namespace Arcanesoft\Tracker\Providers;

use Arcanedev\LaravelTracker\LaravelTrackerServiceProvider;
use Arcanedev\Support\ServiceProvider;
use Illuminate\Support\Arr;

/**
 * Class     PackagesServiceProvider
 *
 * @package  Arcanesoft\Tracker\Providers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class PackagesServiceProvider extends ServiceProvider
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Register the service provider.
     */
    public function register()
    {
        parent::register();

        $this->registerLaravelTrackerPackage();
    }

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        parent::boot();

        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            //
        ];
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
        $this->registerProvider(LaravelTrackerServiceProvider::class);

        $config = $this->config();
        $items  = $config->get('arcanesoft.tracker');

        $config->set('laravel-tracker.database', Arr::get($items, 'database'));
        $config->set('laravel-tracker.models',   Arr::get($items, 'models'));
        $config->set('laravel-tracker.tracking', Arr::get($items, 'tracking'));
        $config->set('laravel-tracker.routes',   Arr::get($items, 'routes'));
    }
}
