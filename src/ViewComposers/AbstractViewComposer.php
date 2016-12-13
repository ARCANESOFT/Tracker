<?php namespace Arcanesoft\Tracker\ViewComposers;

use Closure;
use Illuminate\Support\Facades\Cache;
use Arcanesoft\Tracker\Models;

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
            return Models\Session::with(['user', 'device', 'language', 'agent', 'cookie', 'referer', 'geoip'])->get();
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
            return Models\SessionActivity::all();
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
     * @param  string  $format
     *
     * @return array
     */
    protected function getCurrentMonthDatesRage($format)
    {
        $start = Carbon::now()->subMonth(1)->setTime(0, 0);
        $end   = Carbon::now()->setTime(23, 59, 59);

        $range = new Collection;

        foreach (new DatePeriod($start, DateInterval::createFromDateString('1 day'), $end) as $period) {
            /** @var  \Carbon\Carbon  $period */
            $range->put($date = $period->format($format), $date);
        }

        return compact('start', 'end', 'range');
    }
}
