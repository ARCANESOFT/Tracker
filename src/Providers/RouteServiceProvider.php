<?php namespace Arcanesoft\Tracker\Providers;

use Arcanesoft\Core\Bases\RouteServiceProvider as ServiceProvider;
use Arcanesoft\Tracker\Http\Routes;
use Illuminate\Contracts\Routing\Registrar as Router;
use Illuminate\Support\Arr;

/**
 * Class     RouteServiceProvider
 *
 * @package  Arcanesoft\Tracker\Providers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class RouteServiceProvider extends ServiceProvider
{
    /* ------------------------------------------------------------------------------------------------
     |  Getters & Setters
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get the auth foundation route prefix.
     *
     * @return string
     */
    public function getAdminTrackerPrefix()
    {
        $prefix = Arr::get($this->getAdminRouteGroup(), 'prefix', 'dashboard');

        return "$prefix/" . config('arcanesoft.tracker.route.prefix', 'tracker');
    }

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

    /**
     * Register the admin routes.
     *
     * @param  \Illuminate\Contracts\Routing\Registrar $router
     */
    private function mapAdminRoutes(Router $router)
    {
        $attributes = array_merge($this->getAdminRouteGroup(), [
            'as'        => 'admin::tracker.',
            'namespace' => 'Arcanesoft\\Tracker\\Http\\Controllers\\Admin',
        ]);

        $router->group(array_merge(
            $attributes,
            ['prefix' => $this->getAdminTrackerPrefix()]
        ), function (Router $router) {
            Routes\Admin\TrackerRoutes::register($router);
        });
    }
}
