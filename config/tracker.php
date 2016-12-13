<?php

use Arcanedev\LaravelTracker\Models\AbstractModel;
use Arcanesoft\Tracker\Models;

return [
    /* ------------------------------------------------------------------------------------------------
     |  Route
     | ------------------------------------------------------------------------------------------------
     */
    'route' => [
        'prefix' => 'tracker',
    ],

    /* ------------------------------------------------------------------------------------------------
     |  Database
     | ------------------------------------------------------------------------------------------------
     */
    'database' => [
        'connection' => null,

        'prefix'     => 'tracker_'
    ],

    /* ------------------------------------------------------------------------------------------------
     |  Models
     | ------------------------------------------------------------------------------------------------
     */
    'models' => [
        AbstractModel::MODEL_AGENT                => Models\Agent::class,
        AbstractModel::MODEL_COOKIE               => Models\Cookie::class,
        AbstractModel::MODEL_DEVICE               => Models\Device::class,
        AbstractModel::MODEL_DOMAIN               => Models\Domain::class,
        AbstractModel::MODEL_ERROR                => Models\Error::class,
        AbstractModel::MODEL_GEOIP                => Models\GeoIp::class,
        AbstractModel::MODEL_LANGUAGE             => Models\Language::class,
        AbstractModel::MODEL_PATH                 => Models\Path::class,
        AbstractModel::MODEL_QUERY                => Models\Query::class,
        AbstractModel::MODEL_REFERER              => Models\Referer::class,
        AbstractModel::MODEL_REFERER_SEARCH_TERM  => Models\RefererSearchTerm::class,
        AbstractModel::MODEL_ROUTE                => Models\Route::class,
        AbstractModel::MODEL_ROUTE_PATH           => Models\RoutePath::class,
        AbstractModel::MODEL_ROUTE_PATH_PARAMETER => Models\RoutePathParameter::class,
        AbstractModel::MODEL_SESSION              => Models\Session::class,
        AbstractModel::MODEL_SESSION_ACTIVITY     => Models\SessionActivity::class,
        AbstractModel::MODEL_USER                 => Arcanesoft\Auth\Models\User::class,
    ],

    /* ------------------------------------------------------------------------------------------------
     |  Tracking
     | ------------------------------------------------------------------------------------------------
     */
    'tracking' => [
        'cookies'      => true,
        'devices'      => true,
        'errors'       => true,
        'geoip'        => true,
        'languages'    => true,
        'paths'        => true,
        'path-queries' => true,
        'referers'     => true,
        'users'        => true,
        'user-agents'  => true,
    ],

    /* ------------------------------------------------------------------------------------------------
     |  Routes
     | ------------------------------------------------------------------------------------------------
     */
    'routes' => [
        'ignore' => [
            'names' => [
                // route names like 'blog.*'
            ],
            'uris'  => [
                'dashboard', 'dashboard/*'
            ],
        ],

        'model-columns' => ['id'],
    ],
];
