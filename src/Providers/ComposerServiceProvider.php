<?php namespace Arcanesoft\Tracker\Providers;

use Arcanedev\Support\ServiceProvider;
use Arcanesoft\Tracker\ViewComposers\Dashboard;

/**
 * Class     ComposerServiceProvider
 *
 * @package  Arcanesoft\Tracker\Providers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ComposerServiceProvider extends ServiceProvider
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->registerDashboardComposers();
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        //
    }

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Register all the dashboard view composers.
     */
    private function registerDashboardComposers()
    {
        view()->composer(
            Dashboard\LatestThirtyDaysVisitsAndVisitorsComposer::VIEW,
            Dashboard\LatestThirtyDaysVisitsAndVisitorsComposer::class
        );

        view()->composer(
            Dashboard\AuthenticatedVisitorsRatioComposer::VIEW,
            Dashboard\AuthenticatedVisitorsRatioComposer::class
        );

        view()->composer(
            Dashboard\DevicesRatioComposer::VIEW,
            Dashboard\DevicesRatioComposer::class
        );
    }
}
