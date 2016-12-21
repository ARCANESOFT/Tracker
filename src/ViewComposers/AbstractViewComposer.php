<?php namespace Arcanesoft\Tracker\ViewComposers;

use Arcanesoft\Tracker\Models;
use Arcanesoft\Tracker\Models\Visitor;
use Arcanesoft\Tracker\Models\VisitorActivity;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Cache;

/**
 * Class     AbstractViewComposer
 *
 * @package  Arcanesoft\Tracker\ViewComposers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class AbstractViewComposer
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * The View instance.
     *
     * @var \Illuminate\Contracts\View\View
     */
    protected $view;

    /**
     * Caching time.
     *
     * @var int
     */
    protected $minutes = 5;

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get the cached visitors.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function getCachedVisitors()
    {
        return $this->cacheResults('visitors', function () {
            return Models\Visitor::with(['user', 'device', 'language', 'agent', 'cookie', 'referer', 'geoip'])->get();
        });
    }

    /**
     * Get the cached visits.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function getCachedVisits()
    {
        return $this->cacheResults('visits', function () {
            return Models\VisitorActivity::all();
        });
    }

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Cache the results.
     *
     * @param  string    $name
     * @param  \Closure  $callback
     *
     * @return mixed
     */
    protected function cacheResults($name, Closure $callback)
    {
        return Cache::remember("tracker::{$name}", $this->minutes, $callback);
    }

    /**
     * Get the filtered visitors by date range.
     *
     * @param  \Carbon\Carbon  $start
     * @param  \Carbon\Carbon  $end
     *
     * @return \Illuminate\Support\Collection
     */
    protected function getVisitorsFilteredByDateRange(Carbon $start, Carbon $end)
    {
        return $this->getCachedVisitors()->filter(function (Visitor $session) use ($start, $end) {
            return $session->updated_at->between($start, $end);
        });
    }

    /**
     * Get the filtered visits by date range.
     *
     * @param  \Carbon\Carbon  $start
     * @param  \Carbon\Carbon  $end
     *
     * @return \Illuminate\Support\Collection
     */
    protected function getVisitsFilteredByDateRange(Carbon $start, Carbon $end)
    {
        return $this->getCachedVisits()->filter(function (VisitorActivity $visit) use ($start, $end) {
            return $visit->created_at->between($start, $end);
        });
    }
}
