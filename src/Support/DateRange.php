<?php namespace Arcanesoft\Tracker\Support;

use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use Illuminate\Support\Collection;

/**
 * Class     DateRange
 *
 * @package  Arcanesoft\Tracker\Support
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class DateRange
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get current month's days range.
     *
     * @param  string  $keyFormat
     * @param  string  $interval
     *
     * @return array
     */
    public static function getCurrentMonthDaysRange($keyFormat = 'Y-m-d', $interval = '1 day')
    {
        $start = Carbon::now()->subMonth(1)->setTime(0, 0);
        $end   = Carbon::now()->setTime(23, 59, 59);

        $range = new Collection;

        /** @var  \Carbon\Carbon  $period */
        foreach (new DatePeriod($start, DateInterval::createFromDateString($interval), $end) as $period) {
            $range->put($period->format($keyFormat), $period);
        }

        return compact('start', 'end', 'range');
    }
}
