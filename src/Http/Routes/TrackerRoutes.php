<?php namespace Arcanesoft\Tracker\Http\Routes;

use Arcanedev\Support\Bases\RouteRegister;
use Illuminate\Contracts\Routing\Registrar;

/**
 * Class     TrackerRoutes
 *
 * @package  Arcanesoft\Tracker\Http\Routes
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
     * @param  \Illuminate\Contracts\Routing\Registrar $router
     */
    public function map(Registrar $router)
    {
        $this->group(['prefix' => 'stats', 'as' => 'stats.'], function () {
            $this->get('/', 'DashboardController@index')->name('index'); // tracker::foundation.stats.index
        });

        $this->group(['prefix' => 'visits', 'as' => 'visits.'], function () {
            $this->get('/', 'VisitsController@index')->name('index'); // tracker::foundation.visits.index
        });
    }
}
