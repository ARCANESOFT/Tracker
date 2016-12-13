<?php

use Arcanesoft\Tracker\Models\Device;

return [
    'kinds' => [
        Device::KIND_COMPUTER    => 'Computer',
        Device::KIND_TABLET      => 'Tablet',
        Device::KIND_PHONE       => 'Phone',
        Device::KIND_UNAVAILABLE => '(Unavailable)',
    ],
];
