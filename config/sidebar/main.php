<?php

use Arcanesoft\Auth\Models\Role;

return [
    'title'       => 'Tracker',
    'name'        => 'tracker',
    'route'       => 'tracker::foundation.index',
    'icon'        => 'fa fa-fw fa-binoculars',
    'roles'       => [Role::ADMINISTRATOR],
    'permissions' => [],
    'children'    => [
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
