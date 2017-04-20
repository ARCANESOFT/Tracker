<?php

use Arcanesoft\Auth\Models\Role;

return [
    'title'       => 'tracker::sidebar.tracker',
    'name'        => 'tracker',
    'icon'        => 'fa fa-fw fa-binoculars',
    'roles'       => [Role::ADMINISTRATOR],
    'permissions' => [],
    'children'    => [
        [
            'title'       => 'tracker::sidebar.statistics',
            'name'        => 'tracker-dashboard',
            'route'       => 'admin::tracker.stats.index',
            'icon'        => 'fa fa-fw fa-bar-chart',
            'roles'       => [Role::ADMINISTRATOR],
            'permissions' => [
//                Policies\DashboardPolicy::PERMISSION_STATS
            ],
        ],
        [
            'title'       => 'tracker::sidebar.visitors',
            'name'        => 'tracker-visitors',
            'route'       => 'admin::tracker.visitors.index',
            'icon'        => 'fa fa-fw fa-users',
            'roles'       => [Role::ADMINISTRATOR],
            'permissions' => [
                //
            ],
        ],
        [
            'title'       => 'tracker::sidebar.settings',
            'name'        => 'tracker-settings',
            'route'       => 'admin::tracker.settings.index',
            'icon'        => 'fa fa-fw fa-cog',
            'roles'       => [Role::ADMINISTRATOR],
            'permissions' => [
                //
            ],
        ],
    ],
];
