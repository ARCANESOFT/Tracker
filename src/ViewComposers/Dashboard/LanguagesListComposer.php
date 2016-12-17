<?php namespace Arcanesoft\Tracker\ViewComposers\Dashboard;

use Arcanesoft\Tracker\Models\Session;
use Arcanesoft\Tracker\Support\DateRange;
use Arcanesoft\Tracker\ViewComposers\AbstractViewComposer;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

/**
 * Class     LanguagesListComposer
 *
 * @package  Arcanesoft\Tracker\ViewComposers\Dashboard
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class LanguagesListComposer extends AbstractViewComposer
{
    /* ------------------------------------------------------------------------------------------------
     |  Constants
     | ------------------------------------------------------------------------------------------------
     */
    const VIEW = 'tracker::admin._composers.dashboard.languages-ratio-list';

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

        $view->with('languagesRatio', $this->calculateLanguagesPercentage(
            $this->getLanguagesCountFromSessions($start, $end)
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
    private function getLanguagesCountFromSessions($start, $end)
    {
        return $this->getCachedVisitors()
            ->filter(function (Session $visitor) use ($start, $end) {
                return $visitor->updated_at->between($start, $end) && ! is_null($visitor->language);
            })
            ->transform(function (Session $visitor) {
                return $visitor->language;
            })
            ->groupBy('preference')
            ->transform(function (Collection $items, $key) {
                return [
                    'name'  => $key,
                    'count' => $items->count(),
                ];
            })
            ->sortByDesc('count');
    }

    /**
     * Calculate the languages percentage.
     *
     * @param  \Illuminate\Support\Collection  $languages
     *
     * @return \Illuminate\Support\Collection
     */
    private function calculateLanguagesPercentage($languages)
    {
        $total = $languages->sum('count');

        return $languages->transform(function ($item) use ($total) {
            return $item + [
                'percentage' => round(($item['count'] / $total) * 100, 2)
            ];
        });
    }
}
