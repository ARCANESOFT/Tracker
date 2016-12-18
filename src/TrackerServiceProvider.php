<?php namespace Arcanesoft\Tracker;

use Arcanesoft\Core\Bases\PackageServiceProvider;
use Arcanesoft\Core\CoreServiceProvider;

/**
 * Class     TrackerServiceProvider
 *
 * @package  Arcanesoft\Tracker
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class TrackerServiceProvider extends PackageServiceProvider
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Package name.
     *
     * @var string
     */
    protected $package = 'tracker';

    /* ------------------------------------------------------------------------------------------------
     |  Getters & Setters
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get the base path of the package.
     *
     * @return string
     */
    public function getBasePath()
    {
        return dirname(__DIR__);
    }

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     *
     */
    public function register()
    {
        $this->registerConfig();
        $this->registerSidebarItems();
        $this->registerProviders([
            CoreServiceProvider::class,
            Providers\PackagesServiceProvider::class,
            Providers\AuthorizationServiceProvider::class,
            Providers\ComposerServiceProvider::class,
        ]);
        $this->registerConsoleServiceProvider(Providers\CommandServiceProvider::class);
    }

    /**
     *
     */
    public function boot()
    {
        parent::boot();
        $this->registerProvider(Providers\RouteServiceProvider::class);

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

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
}
