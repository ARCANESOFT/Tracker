<?php

use Arcanesoft\Auth\Models\Role;

return [
    'title'       => 'Tracker',
    'name'        => 'tracker',
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
            'title'       => 'Visitors',
            'name'        => 'tracker-visitors',
            'route'       => 'admin::tracker.visitors.index',
            'icon'        => 'fa fa-fw fa-users',
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
