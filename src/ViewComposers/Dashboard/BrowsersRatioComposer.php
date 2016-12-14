<?php namespace Arcanesoft\Tracker\ViewComposers\Dashboard;

use Arcanesoft\Tracker\Models\Session;
use Arcanesoft\Tracker\Support\DateRange;
use Arcanesoft\Tracker\ViewComposers\AbstractViewComposer;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

/**
 * Class     BrowsersRatioComposer
 *
 * @package  Arcanesoft\Tracker\ViewComposers\Dashboard
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class BrowsersRatioComposer extends AbstractViewComposer
{
    /* ------------------------------------------------------------------------------------------------
     |  Constants
     | ------------------------------------------------------------------------------------------------
     */
    const VIEW = 'tracker::foundation._composers.dashboard.browsers-ratio-chart';

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

        $view->with('browsersRatio', $this->getBrowsersCountFromSessions($start, $end));
    }

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get the browsers count from sessions.
     *
     * @param  \Carbon\Carbon                  $start
     * @param  \Carbon\Carbon                  $end
     *
     * @return \Illuminate\Support\Collection  $range
     */
    private function getBrowsersCountFromSessions(Carbon $start, Carbon $end)
    {
        return $this->getCachedVisitors()
            ->filter(function (Session $visitor) use ($start, $end) {
                return $visitor->updated_at->between($start, $end) && ! is_null($visitor->agent);
            })
            ->transform(function (Session $visitor) {
                return $visitor->agent;
            })
            ->groupBy('browser')
            ->transform(function (Collection $items, $key) {
                return [
                    'name'  => $key,
                    'count' => $items->count(),
                ];
            })
            ->sortByDesc('count');
    }
}
