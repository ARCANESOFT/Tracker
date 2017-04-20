<?php namespace Arcanesoft\Tracker\Models;

use Arcanedev\LaravelTracker\Models\Device as BaseDevice;

/**
 * Class     Device
 *
 * @package  Arcanesoft\Tracker\Models
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Device extends BaseDevice
{
    /* -----------------------------------------------------------------
     |  Traits
     | -----------------------------------------------------------------
     */

    use Presenters\DevicePresenter;
}
