<?php namespace Arcanesoft\Tracker\ViewComposers\Dashboard;

use Arcanesoft\Tracker\Models\Session;
use Arcanesoft\Tracker\Support\DateRange;
use Arcanesoft\Tracker\ViewComposers\AbstractViewComposer;
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

        $view->with(
            'authenticatedVisitors',
            $this->getAuthenticatedVisitors($start, $end)
        );

        $view->with(
            'guestVisitors',
            $this->getGuestVisitors($start, $end)
        );
    }

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get the authenticated visitors.
     *
     * @param  \Carbon\Carbon  $start
     * @param  \Carbon\Carbon  $end
     *
     * @return \Illuminate\Support\Collection
     */
    private function getAuthenticatedVisitors($start, $end)
    {
        return $this->getCachedVisitors()
            ->filter(function (Session $session) use ($start, $end) {
                return $session->updated_at->between($start, $end);
            })
            ->filter(function (Session $session) use ($start, $end) {
                return $session->hasUser();
            });
    }

    /**
     * Get the guest visitors.
     *
     * @param  \Carbon\Carbon  $start
     * @param  \Carbon\Carbon  $end
     *
     * @return \Illuminate\Support\Collection
     */
    private function getGuestVisitors($start, $end)
    {
        return $this->getCachedVisitors()
            ->filter(function (Session $session) use ($start, $end) {
                return $session->updated_at->between($start, $end);
            })
            ->filter(function (Session $session) use ($start, $end) {
                return ! $session->hasUser();
            });
    }
}
