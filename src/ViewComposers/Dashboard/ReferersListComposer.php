<?php namespace Arcanesoft\Tracker\ViewComposers\Dashboard;

use Arcanesoft\Tracker\Models\SessionActivity;
use Arcanesoft\Tracker\Support\DateRange;
use Arcanesoft\Tracker\ViewComposers\AbstractViewComposer;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

/**
 * Class     ReferersListComposer
 *
 * @package  Arcanesoft\Tracker\ViewComposers\Dashboard
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ReferersListComposer extends AbstractViewComposer
{
    /* ------------------------------------------------------------------------------------------------
     |  Constants
     | ------------------------------------------------------------------------------------------------
     */
    const VIEW = 'tracker::admin._composers.dashboard.referers-ratio-list';

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

        $view->with('referersRatio', $this->calculateLanguagesPercentage(
            $this->getReferersCountFromSessionActivities($start, $end)
        ));
    }

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get the languages count from sessions.
     *
     * @param  \Carbon\Carbon  $start
     * @param  \Carbon\Carbon  $end
     *
     * @return \Illuminate\Support\Collection
     */
    private function getReferersCountFromSessionActivities($start, $end)
    {
        return $this->getVisitsFilteredByDateRange($start, $end)
            ->transform(function (SessionActivity $visit) {
                return [
                    'name' => $visit->hasReferer()
                        ? $visit->referer->domain->name
                        : trans('tracker::referers.undefined'),
                ];
            })
            ->groupBy('name')
            ->transform(function (Collection $items, $key) {
                return [
                    'name'  => $key,
                    'count' => $items->count(),
                ];
            })
            ->sortByDesc('count');
    }

    /**
     * Calculate the referers percentage.
     *
     * @param  \Illuminate\Support\Collection  $referers
     *
     * @return \Illuminate\Support\Collection
     */
    private function calculateLanguagesPercentage($referers)
    {
        $total = $referers->sum('count');

        return $referers->transform(function ($item) use ($total) {
            return $item + [
                'percentage' => round(($item['count'] / $total) * 100, 2)
            ];
        });
    }
}
