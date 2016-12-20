<?php

use Arcanesoft\Auth\Models\Role;

return [
    'title'       => 'Tracker',
    'name'        => 'tracker',
    'route'       => 'admin::tracker.stats.index',
    'icon'        => 'fa fa-fw fa-binoculars',
    'roles'       => [Role::ADMINISTRATOR],
    'permissions' => [],
    'children'    => [
        [
            'title'       => 'Statistics',
            'name'        => 'tracker-dashboard',
            'route'       => 'admin::tracker.stats.index',
            'icon'        => 'fa fa-fw fa-bar-chart',
            'roles'       => [Role::ADMINISTRATOR],
            'permissions' => [
//                Policies\DashboardPolicy::PERMISSION_STATS
            ],
        ],
        [
            'title'       => 'Visits',
            'name'        => 'tracker-visits',
            'route'       => 'admin::tracker.visits.index',
            'icon'        => 'fa fa-fw fa-info-circle',
            'roles'       => [Role::ADMINISTRATOR],
            'permissions' => [
                //
            ],
        ],
        [
            'title'       => 'Settings',
            'name'        => 'tracker-settings',
            'route'       => 'admin::tracker.settings.index',
            'icon'        => 'fa fa-fw fa-cogs',
            'roles'       => [Role::ADMINISTRATOR],
            'permissions' => [
                //
            ],
        ],
    ],
];
