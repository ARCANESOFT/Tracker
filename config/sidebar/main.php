<?php

use Arcanesoft\Auth\Models\Role;

return [
    'title'       => 'Tracker',
    'name'        => 'tracker',
    'route'       => 'tracker::foundation.stats.index',
    'icon'        => 'fa fa-fw fa-binoculars',
    'roles'       => [Role::ADMINISTRATOR],
    'permissions' => [],
    'children'    => [
        [
            'title'       => 'Statistics',
            'name'        => 'tracker-dashboard',
            'route'       => 'tracker::foundation.stats.index',
            'icon'        => 'fa fa-fw fa-bar-chart',
            'roles'       => [Role::ADMINISTRATOR],
            'permissions' => [
//                Policies\DashboardPolicy::PERMISSION_STATS
            ],
        ],
        [
            'title'       => 'Visits',
            'name'        => 'tracker-visits',
            'route'       => 'tracker::foundation.visits.index',
            'icon'        => 'fa fa-fw fa-info-circle',
            'roles'       => [Role::ADMINISTRATOR],
            'permissions' => [
                //
            ],
        ],
    ],
];
