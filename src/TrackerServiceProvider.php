<?php namespace Arcanesoft\Tracker;

use Arcanesoft\Core\Bases\PackageServiceProvider;

/**
 * Class     TrackerServiceProvider
 *
 * @package  Arcanesoft\Tracker
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class TrackerServiceProvider extends PackageServiceProvider
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /**
     * Package name.
     *
     * @var string
     */
    protected $package = 'tracker';

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

        $this->registerConfig();
        $this->registerSidebarItems();
        $this->registerProviders([
            Providers\PackagesServiceProvider::class,
            Providers\AuthorizationServiceProvider::class,
            Providers\ComposerServiceProvider::class,
            Providers\RouteServiceProvider::class,
        ]);
        $this->registerConsoleServiceProvider(Providers\CommandServiceProvider::class);
    }

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        parent::boot();

        // Publishes
        $this->publishConfig();
        $this->publishViews();
        $this->publishTranslations();
        $this->publishSidebarItems();
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
}
