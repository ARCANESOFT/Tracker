<?php

use Arcanesoft\Auth\Models\Role;

return [
    'title'       => 'Tracker',
    'name'        => 'tracker',
    'route'       => 'tracker::foundation.index',
    'icon'        => 'fa fa-fw fa-picture-o',
    'roles'       => [Role::ADMINISTRATOR],
    'permissions' => [],
    'children'    => [
        //
    ],
];
