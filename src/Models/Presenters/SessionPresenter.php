<?php namespace Arcanesoft\Tracker\Models\Presenters;

/**
 * Class     SessionPresenter
 *
 * @package  Arcanesoft\Tracker\Models\Presenters
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @property  \Arcanesoft\Auth\Models\User  user
 */
trait SessionPresenter
{
    /* ------------------------------------------------------------------------------------------------
     |  Getters & Setters
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get the `username` attribute.
     *
     * @return string
     */
    public function getUsernameAttribute()
    {
        return $this->hasUser() ? $this->user->full_name : trans('tracker::users.guest');
    }
}
