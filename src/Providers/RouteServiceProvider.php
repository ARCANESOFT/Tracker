<?php namespace Arcanesoft\Tracker\Providers;

use Arcanesoft\Core\Bases\RouteServiceProvider as ServiceProvider;
use Arcanesoft\Tracker\Http\Routes;
use Illuminate\Contracts\Routing\Registrar as Router;

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
     *
     * @param  \Illuminate\Contracts\Routing\Registrar  $router
     */
    public function map(Router $router)
    {
        $this->mapAdminRoutes($router);
    }

    /* ------------------------------------------------------------------------------------------------
     |  Routes
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Register the admin routes.
     *
     * @param  \Illuminate\Contracts\Routing\Registrar $router
     */
    private function mapAdminRoutes(Router $router)
    {
        $attributes = $this->getAdminAttributes(
            'tracker.',
            'Arcanesoft\\Tracker\\Http\\Controllers\\Admin',
            $this->config()->get('arcanesoft.tracker.route.prefix', 'tracker')
        );

        $router->group($attributes, function (Router $router) {
            Routes\Admin\TrackerRoutes::register($router);
        });
    }
}
