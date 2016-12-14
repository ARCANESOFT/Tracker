<?php namespace Arcanesoft\Tracker\ViewComposers\Dashboard;

use Arcanesoft\Tracker\Models\Device;
use Arcanesoft\Tracker\Models\Session;
use Arcanesoft\Tracker\Support\DateRange;
use Arcanesoft\Tracker\ViewComposers\AbstractViewComposer;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\View\View;

/**
 * Class     DevicesRatioComposer
 *
 * @package  Arcanesoft\Tracker\ViewComposers\Dashboard
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class DevicesRatioComposer extends AbstractViewComposer
{
    /* ------------------------------------------------------------------------------------------------
     |  Constants
     | ------------------------------------------------------------------------------------------------
     */
    const VIEW = 'tracker::foundation._composers.dashboard.devices-ratio-chart';

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
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

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
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
        return $this->getCachedVisitors()
            ->filter(function (Session $session) use ($start, $end) {
                return $session->updated_at->between($start, $end) && ! is_null($session->device);
            })
            ->transform(function (Session $session) {
                return $session->device;
            })
            ->groupBy('kind')
            ->transform(function ($items, $key) {
                return [
                    'kind'  => trans("tracker::device.kinds.$key"),
                    'count' => $items->count(),
                ];
            });
    }

    /**
     * Get the computers count.
     *
     * @param  \Illuminate\Support\Collection  $devices
     *
     * @return int
     */
    protected function getComputersCount(Collection $devices)
    {
        return $devices->filter(function (Device $device) {
            return $device->isComputer();
        })->count();
    }

    /**
     * Get the tablets count.
     *
     * @param  \Illuminate\Support\Collection  $devices
     *
     * @return int
     */
    protected function getTabletsCount(Collection $devices)
    {
        return $devices->filter(function (Device $device) {
            return $device->isTablet();
        })->count();
    }

    /**
     * Get the phones count.
     *
     * @param  \Illuminate\Support\Collection  $devices
     *
     * @return int
     */
    protected function getPhonesCount(Collection $devices)
    {
        return $devices->filter(function (Device $device) {
            return $device->isPhone();
        })->count();
    }

    /**
     * Get the computers count.
     *
     * @param  \Illuminate\Support\Collection  $devices
     *
     * @return int
     */
    protected function getUnavailableCount(Collection $devices)
    {
        return $devices->reject(function (Device $device) {
            return $device->isComputer() || $device->isTablet() || $device->isPhone();
        })->count();
    }
}
