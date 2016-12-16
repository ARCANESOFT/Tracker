<?php

use Arcanesoft\Tracker\Models\Device;

return [
    'kinds' => [
        Device::KIND_COMPUTER    => 'Ordinateur',
        Device::KIND_TABLET      => 'Tablette',
        Device::KIND_PHONE       => 'Téléphone',
        Device::KIND_UNAVAILABLE => '(Indisponible)',
    ],
];
