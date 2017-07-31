<?php

use Arcanedev\LaravelTracker\Support\BindingManager;
use Arcanesoft\Tracker\Models;

return [

    /* -----------------------------------------------------------------
     |  Route
     | -----------------------------------------------------------------
     */

    'route' => [
        'prefix' => 'tracker',
    ],

    /* -----------------------------------------------------------------
     |  Database
     | -----------------------------------------------------------------
     */

    'database' => [
        'connection' => null,

        'prefix'     => 'tracker_'
    ],

    /* -----------------------------------------------------------------
     |  Models
     | -----------------------------------------------------------------
     */

    'models' => [
        BindingManager::MODEL_AGENT                => Models\Agent::class,
        BindingManager::MODEL_COOKIE               => Models\Cookie::class,
        BindingManager::MODEL_DEVICE               => Models\Device::class,
        BindingManager::MODEL_DOMAIN               => Models\Domain::class,
        BindingManager::MODEL_ERROR                => Models\Error::class,
        BindingManager::MODEL_GEOIP                => Models\GeoIp::class,
        BindingManager::MODEL_LANGUAGE             => Models\Language::class,
        BindingManager::MODEL_PATH                 => Models\Path::class,
        BindingManager::MODEL_QUERY                => Models\Query::class,
        BindingManager::MODEL_REFERER              => Models\Referer::class,
        BindingManager::MODEL_REFERER_SEARCH_TERM  => Models\RefererSearchTerm::class,
        BindingManager::MODEL_ROUTE                => Models\Route::class,
        BindingManager::MODEL_ROUTE_PATH           => Models\RoutePath::class,
        BindingManager::MODEL_ROUTE_PATH_PARAMETER => Models\RoutePathParameter::class,
        BindingManager::MODEL_USER                 => Arcanesoft\Auth\Models\User::class,
        BindingManager::MODEL_VISITOR              => Models\Visitor::class,
        BindingManager::MODEL_VISITOR_ACTIVITY     => Models\VisitorActivity::class,
    ],

    /* -----------------------------------------------------------------
     |  Tracking
     | -----------------------------------------------------------------
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

    /* -----------------------------------------------------------------
     |  Routes
     | -----------------------------------------------------------------
     */

    'routes' => [
        'ignore' => [
            'names' => [
                // Route names like 'blog.*'
                'admin::*',
            ],
            'uris'  => [
                // URIs like 'dashboard/*'
            ],
        ],

        'model-columns' => ['id'],
    ],
];
