<?php namespace Arcanesoft\Tracker\ViewComposers\Dashboard;

use Arcanesoft\Tracker\Support\DateRange;
use Arcanesoft\Tracker\ViewComposers\AbstractViewComposer;
use Illuminate\Contracts\View\View;

/**
 * Class     TotalUniqueUsersBoxComposer
 *
 * @package  Arcanesoft\Tracker\ViewComposers\Dashboard
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class TotalUniqueUsersBoxComposer extends AbstractViewComposer
{
    /* ------------------------------------------------------------------------------------------------
     |  Constants
     | ------------------------------------------------------------------------------------------------
     */

    const VIEW = 'tracker::foundation._composers.dashboard.total-unique-visitors-box';

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

        $view->with('uniqueUsersCount', $this->getVisitorsFilteredByDateRange($start, $end)->count());
    }
}
