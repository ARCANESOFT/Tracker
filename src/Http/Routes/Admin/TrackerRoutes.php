<?php namespace Arcanesoft\Tracker\Http\Routes\Admin;

use Arcanedev\Support\Bases\RouteRegister;
use Illuminate\Contracts\Routing\Registrar;

/**
 * Class     TrackerRoutes
 *
 * @package  Arcanesoft\Tracker\Http\Routes\Admin
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class TrackerRoutes extends RouteRegister
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Map routes.
     *
     * @param  \Illuminate\Contracts\Routing\Registrar  $router
     */
    public function map(Registrar $router)
    {
        $this->group(['prefix' => 'stats', 'as' => 'stats.'], function () {
            $this->get('/', 'DashboardController@index')->name('index'); // admin::tracker.stats.index
        });

        $this->group(['prefix' => 'visitors', 'as' => 'visitors.'], function () {
            $this->get('/', 'VisitorsController@index')->name('index'); // admin::tracker.visitors.index
        });

        $this->group(['prefix' => 'settings', 'as' => 'settings.'], function () {
            $this->get('/', 'SettingsController@index')->name('index'); // admin::tracker.settings.index
        });
    }
}
