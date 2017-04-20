<?php namespace Arcanesoft\Tracker\ViewComposers\Dashboard;

use Arcanesoft\Tracker\Models\Visitor;
use Arcanesoft\Tracker\Support\DateRange;
use Arcanesoft\Tracker\ViewComposers\AbstractViewComposer;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

/**
 * Class     OperatingSystemRationComposer
 *
 * @package  Arcanesoft\Tracker\ViewComposers\Dashboard
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class OperatingSystemRationComposer extends AbstractViewComposer
{
    /* -----------------------------------------------------------------
     |  Constants
     | -----------------------------------------------------------------
     */

    const VIEW = 'tracker::admin._composers.dashboard.os-ratio-chart';

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

        $view->with('operatingSystemRatio', $this->getOperatingSystemsCountFromSessions($start, $end));
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Get the operating systems count from sessions.
     *
     * @param  \Carbon\Carbon                  $start
     * @param  \Carbon\Carbon                  $end
     *
     * @return \Illuminate\Support\Collection
     */
    private function getOperatingSystemsCountFromSessions(Carbon $start, Carbon $end)
    {
        return $this->getVisitorsFilteredByDateRange($start, $end)
            ->filter(function (Visitor $visitor) {
                return $visitor->hasDevice();
            })
            ->transform(function (Visitor $visitor) {
                return $visitor->device;
            })
            ->groupBy('platform')
            ->transform(function (Collection $items, $platform) {
                return [
                    'platform' => $platform,
                    'count'    => $items->count(),
                ];
            })
            ->sortByDesc('count');
    }
}
