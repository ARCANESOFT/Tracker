<?php namespace Arcanesoft\Tracker\ViewComposers\Dashboard;

use Arcanesoft\Tracker\Models\Session;
use Arcanesoft\Tracker\Models\SessionActivity;
use Arcanesoft\Tracker\Support\DateRange;
use Arcanesoft\Tracker\ViewComposers\AbstractViewComposer;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

/**
 * Class     LatestThirtyDaysVisitsAndVisitorsComposer
 *
 * @package  Arcanesoft\Tracker\ViewComposers\Dashboard
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class LatestThirtyDaysVisitsAndVisitorsComposer extends AbstractViewComposer
{
    /* ------------------------------------------------------------------------------------------------
     |  Constants
     | ------------------------------------------------------------------------------------------------
     */
    const VIEW = 'tracker::foundation._composers.dashboard.latest-thirty-days-visits-and-visitors-chart';

    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Date format.
     *
     * @var string
     */
    protected $format = 'M-d';

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
        extract(DateRange::getCurrentMonthDaysRange($this->format));

        $view->with('thirtyDaysRange', $range->map(function (Carbon $date) {
            return $date->format($this->format);
        }));

        $view->with('latestVisitsByThirtyDays',   $this->prepareVisitsData($start, $end, $range));
        $view->with('latestVisitorsByThirtyDays', $this->prepareVisitorsData($start, $end, $range));
    }

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Prepare the visitors data.
     *
     * @param  \Carbon\Carbon                  $start
     * @param  \Carbon\Carbon                  $end
     * @param  \Illuminate\Support\Collection  $range
     *
     * @return \Illuminate\Support\Collection
     */
    public function prepareVisitorsData(Carbon $start, Carbon $end, Collection $range)
    {
        $visitors = $this->getVisitorsFilteredByDateRange($start, $end)
            ->groupBy(function (Session $visitor) {
                return $visitor->created_at->format($this->format);
            });

        return $range->map(function (Carbon $date) use ($visitors) {
            return $visitors->get($date->format($this->format), new Collection)->count();
        });
    }

    /**
     * Prepare the visits data.
     *
     * @param  \Carbon\Carbon                  $start
     * @param  \Carbon\Carbon                  $end
     * @param  \Illuminate\Support\Collection  $range
     *
     * @return \Illuminate\Support\Collection
     */
    private function prepareVisitsData(Carbon $start, Carbon $end, $range)
    {

        $visits = $this->getVisitsFilteredByDateRange($start, $end)
            ->groupBy(function (SessionActivity $visit) {
                return $visit->created_at->format($this->format);
            });

        return $range->map(function (Carbon $date) use ($visits) {
            return $visits->get($date->format($this->format), new Collection)->count();
        });
    }
}
