<?php namespace Arcanesoft\Tracker\Providers;

use Arcanedev\Support\Providers\ViewComposerServiceProvider as ServiceProvider;
use Arcanesoft\Tracker\ViewComposers\Dashboard\AuthenticatedVisitorsRatioComposer;
use Arcanesoft\Tracker\ViewComposers\Dashboard\BrowsersRatioComposer;
use Arcanesoft\Tracker\ViewComposers\Dashboard\CountriesListComposer;
use Arcanesoft\Tracker\ViewComposers\Dashboard\DevicesRatioComposer;
use Arcanesoft\Tracker\ViewComposers\Dashboard\LanguagesListComposer;
use Arcanesoft\Tracker\ViewComposers\Dashboard\LatestThirtyDaysVisitsAndVisitorsComposer;
use Arcanesoft\Tracker\ViewComposers\Dashboard\OperatingSystemRationComposer;
use Arcanesoft\Tracker\ViewComposers\Dashboard\ReferersListComposer;
use Arcanesoft\Tracker\ViewComposers\Dashboard\TotalPageViewsBoxComposer;
use Arcanesoft\Tracker\ViewComposers\Dashboard\TotalUniqueUsersBoxComposer;

/**
 * Class     ComposerServiceProvider
 *
 * @package  Arcanesoft\Tracker\Providers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ComposerServiceProvider extends ServiceProvider
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Register the composer classes.
     *
     * @var array
     */
    protected $composerClasses = [
        // Dashboard view composers
        TotalUniqueUsersBoxComposer::VIEW               => TotalUniqueUsersBoxComposer::class,
        TotalPageViewsBoxComposer::VIEW                 => TotalPageViewsBoxComposer::class,
        LatestThirtyDaysVisitsAndVisitorsComposer::VIEW => LatestThirtyDaysVisitsAndVisitorsComposer::class,
        AuthenticatedVisitorsRatioComposer::VIEW        => AuthenticatedVisitorsRatioComposer::class,
        DevicesRatioComposer::VIEW                      => DevicesRatioComposer::class,
        BrowsersRatioComposer::VIEW                     => BrowsersRatioComposer::class,
        OperatingSystemRationComposer::VIEW             => OperatingSystemRationComposer::class,
        LanguagesListComposer::VIEW                     => LanguagesListComposer::class,
        CountriesListComposer::VIEW                     => CountriesListComposer::class,
        ReferersListComposer::VIEW                      => ReferersListComposer::class,
    ];
}
