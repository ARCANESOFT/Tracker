<?php namespace Arcanesoft\Tracker\Http\Routes\Admin;

use Arcanedev\Support\Routing\RouteRegistrar;

/**
 * Class     TrackerRoutes
 *
 * @package  Arcanesoft\Tracker\Http\Routes\Admin
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class TrackerRoutes extends RouteRegistrar
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Map routes.
     */
    public function map()
    {
        $this->prefix('stats')->name('stats.')->group(function () {
            $this->get('/', 'DashboardController@index')
                 ->name('index'); // admin::tracker.stats.index
        });

        $this->prefix('visitors')->name('visitors.')->group(function () {
            $this->get('/', 'VisitorsController@index')
                 ->name('index'); // admin::tracker.visitors.index
        });

        $this->prefix('settings')->name('settings.')->group(function () {
            $this->get('/', 'SettingsController@index')
                 ->name('index'); // admin::tracker.settings.index
        });
    }
}
