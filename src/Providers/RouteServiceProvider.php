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
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /**
     * The admin controller namespace for the application.
     *
     * @var string
     */
    protected $adminNamespace = 'Arcanesoft\\Tracker\\Http\\Controllers\\Admin';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Define the routes for the application.
     */
    public function map()
    {
        $this->adminGroup(function () {
            $this->mapAdminRoutes();
        });
    }

    /**
     * Register the admin routes.
     */
    private function mapAdminRoutes()
    {
        $this->name('tracker.')
             ->prefix($this->config()->get('arcanesoft.tracker.route.prefix', 'tracker'))
             ->group(function () {
                 Routes\Admin\TrackerRoutes::register();
             });
    }
}
