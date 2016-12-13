<?php namespace Arcanesoft\Tracker\Models\Presenters;

/**
 * Class     DevicePresenter
 *
 * @package  Arcanesoft\Tracker\Models\Presenters
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @property  string  kind_name
 */
trait DevicePresenter
{
    /* ------------------------------------------------------------------------------------------------
     |  Getters & Setters
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get the `kind_name` attribute.
     *
     * @return string
     */
    public function getKindNameAttribute()
    {
        return trans("tracker::device.kinds.{$this->kind}");
    }
}
