<?php

use Arcanesoft\Tracker\Models\Device;

return [

    /* -----------------------------------------------------------------
     |  Titles
     | -----------------------------------------------------------------
     */

    'titles' => [
        'devices'          => 'Devices',
        'operating-system' => 'Operating System',
    ],

    /* -----------------------------------------------------------------
     |  Kinds
     | -----------------------------------------------------------------
     */

    'kinds' => [
        Device::KIND_COMPUTER    => 'Computer',
        Device::KIND_TABLET      => 'Tablet',
        Device::KIND_PHONE       => 'Phone',
        Device::KIND_UNAVAILABLE => '(Unavailable)',
    ],

];
