<?php namespace Arcanesoft\Tracker\Providers;

use Arcanesoft\Core\Bases\RouteServiceProvider as ServiceProvider;
use Arcanesoft\Tracker\Http\Routes;

/**
 * Class     RouteServiceProvider
 *
 * @package  Arcanesoft\Tracker\Providers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class RouteServiceProvider extends ServiceProvider
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Define the routes for the application.
     */
    public function map()
    {
        $this->mapAdminRoutes();
    }

    /* ------------------------------------------------------------------------------------------------
     |  Routes
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Register the admin routes.
     */
    private function mapAdminRoutes()
    {
        $attributes = $this->getAdminAttributes(
            'tracker.',
            'Arcanesoft\\Tracker\\Http\\Controllers\\Admin',
            $this->config()->get('arcanesoft.tracker.route.prefix', 'tracker')
        );

        $this->group($attributes, function () {
            Routes\Admin\TrackerRoutes::register();
        });
    }
}
