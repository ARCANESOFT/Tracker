<?php namespace Arcanesoft\Tracker\ViewComposers\Dashboard;

use Arcanesoft\Tracker\Models\Session;
use Arcanesoft\Tracker\Support\DateRange;
use Arcanesoft\Tracker\ViewComposers\AbstractViewComposer;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;

/**
 * Class     AuthenticatedVisitorsRatioComposer
 *
 * @package  Arcanesoft\Tracker\ViewComposers\Dashboard
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class AuthenticatedVisitorsRatioComposer extends AbstractViewComposer
{
    /* ------------------------------------------------------------------------------------------------
     |  Constants
     | ------------------------------------------------------------------------------------------------
     */
    const VIEW = 'tracker::foundation._composers.dashboard.authenticated-visitors-ratio-chart';

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

        $visitors = $this->filterVisitors($start, $end);

        $view->with('authenticatedVisitorsRatio', $this->getAuthenticatedVisitorsRatio($visitors));
    }

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get the authenticated visitors ratio.
     *
     * @param  \Illuminate\Support\Collection  $visitors
     *
     * @return \Illuminate\Support\Collection
     */
    private function getAuthenticatedVisitorsRatio($visitors)
    {
        $ratio = [
            'authenticated' => 0,
            'guest'         => 0,
        ];

        foreach ($visitors as $visitor) {
            $visitor->hasUser() ? $ratio['authenticated'] += 1 : $ratio['guest'] += 1;
        }

        return collect($ratio)->transform(function ($count, $key) {
            return [
                'name'  => trans("tracker::users.$key"),
                'count' => $count,
            ];
        });
    }

    /**
     * Get the filtered visitors.
     *
     * @param  \Carbon\Carbon  $start
     * @param  \Carbon\Carbon  $end
     *
     * @return \Illuminate\Support\Collection
     */
    private function filterVisitors(Carbon $start, Carbon $end)
    {
        return $this->getCachedVisitors()->filter(function (Session $session) use ($start, $end) {
            return $session->updated_at->between($start, $end);
        });
    }
}