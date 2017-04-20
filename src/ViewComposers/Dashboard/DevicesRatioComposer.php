<?php namespace Arcanesoft\Tracker\ViewComposers\Dashboard;

use Arcanesoft\Tracker\Models\Visitor;
use Arcanesoft\Tracker\Support\DateRange;
use Arcanesoft\Tracker\ViewComposers\AbstractViewComposer;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

/**
 * Class     DevicesRatioComposer
 *
 * @package  Arcanesoft\Tracker\ViewComposers\Dashboard
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class DevicesRatioComposer extends AbstractViewComposer
{
    /* -----------------------------------------------------------------
     |  Constants
     | -----------------------------------------------------------------
     */

    const VIEW = 'tracker::admin._composers.dashboard.devices-ratio-chart';

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Compose the view.
     *
     * @param  \Illuminate\Contracts\View\View  $view
     */
    public function compose(View $view)
    {
        /**
         * @var  \Carbon\Carbon                  $start
         * @var  \Carbon\Carbon                  $end
         * @var  \Illuminate\Support\Collection  $range
         */
        extract(DateRange::getCurrentMonthDaysRange());

        $view->with('devicesRatio',  $this->getDevicesFromSessions($start, $end));
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Get the devices from sessions.
     *
     * @param  \Carbon\Carbon  $start
     * @param  \Carbon\Carbon  $end
     *
     * @return \Illuminate\Support\Collection
     */
    protected function getDevicesFromSessions(Carbon $start, Carbon $end)
    {
        return $this->getVisitorsFilteredByDateRange($start, $end)
            ->filter(function (Visitor $session) {
                return $session->hasDevice();
            })
            ->transform(function (Visitor $session) {
                return $session->device;
            })
            ->groupBy('kind')
            ->transform(function (Collection $items, $key) {
                return [
                    'kind'  => trans("tracker::devices.kinds.$key"),
                    'count' => $items->count(),
                ];
            });
    }
}
