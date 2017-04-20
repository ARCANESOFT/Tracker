<?php namespace Arcanesoft\Tracker\ViewComposers\Dashboard;

use Arcanesoft\Tracker\Models\Visitor;
use Arcanesoft\Tracker\Support\DateRange;
use Arcanesoft\Tracker\ViewComposers\AbstractViewComposer;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

/**
 * Class     CountriesListComposer
 *
 * @package  Arcanesoft\Tracker\ViewComposers\Dashboard
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class CountriesListComposer extends AbstractViewComposer
{
    /* -----------------------------------------------------------------
     |  Constants
     | -----------------------------------------------------------------
     */

    const VIEW = 'tracker::admin._composers.dashboard.countries-ratio-list';

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

        $view->with('countriesRatio', $this->calculateCountriesPercentage(
            $this->getCountriesCountFromSessions($start, $end)
        ));
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Get the countries count from sessions.
     *
     * @param  \Carbon\Carbon  $start
     * @param  \Carbon\Carbon  $end
     *
     * @return \Illuminate\Support\Collection
     */
    private function getCountriesCountFromSessions(Carbon $start, Carbon $end)
    {
        return $this->getVisitorsFilteredByDateRange($start, $end)
            ->transform(function (Visitor $visitor) {
                return $visitor->hasGeoip()
                    ? [
                        'code'  => $visitor->geoip->iso_code,
                        'geoip' => $visitor->geoip,
                    ]
                    : [
                        'code'  => 'undefined',
                        'geoip' => null,
                    ];
            })
            ->groupBy('code')
            ->transform(function (Collection $items, $key) {
                return ($key === 'undefined')
                    ? [
                        'code'  => null,
                        'name'  => trans('tracker::generals.undefined'),
                        'count' => $items->count(),
                    ]
                    : [
                        'code'  => $key,
                        'name'  => $items->first()['geoip']->country,
                        'count' => $items->count(),
                    ];
            });
    }

    /**
     * Calculate countries percentage.
     *
     * @param  \Illuminate\Support\Collection  $countries
     *
     * @return \Illuminate\Support\Collection
     */
    private function calculateCountriesPercentage(Collection $countries)
    {
        $total = $countries->sum('count');

        return $countries->transform(function ($item) use ($total) {
            return $item + [
                'percentage' => round(($item['count'] / $total) * 100, 2)
            ];
        });
    }
}
