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
            Dashboard\TotalUniqueUsersBoxComposer::VIEW,
            Dashboard\TotalUniqueUsersBoxComposer::class
        );

        view()->composer(
            Dashboard\TotalPageViewsBoxComposer::VIEW,
            Dashboard\TotalPageViewsBoxComposer::class
        );

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

        view()->composer(
            Dashboard\BrowsersRatioComposer::VIEW,
            Dashboard\BrowsersRatioComposer::class
        );

        view()->composer(
            Dashboard\OperatingSystemRationComposer::VIEW,
            Dashboard\OperatingSystemRationComposer::class
        );

        view()->composer(
            Dashboard\LanguagesListComposer::VIEW,
            Dashboard\LanguagesListComposer::class
        );

        view()->composer(
            Dashboard\CountriesListComposer::VIEW,
            Dashboard\CountriesListComposer::class
        );

        view()->composer(
            Dashboard\ReferersListComposer::VIEW,
            Dashboard\ReferersListComposer::class
        );
    }
}
