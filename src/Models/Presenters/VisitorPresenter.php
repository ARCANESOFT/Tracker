<?php namespace Arcanesoft\Tracker\Models\Presenters;

/**
 * Trait     VisitorPresenter
 *
 * @package  Arcanesoft\Tracker\Models\Presenters
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @property  \Arcanesoft\Auth\Models\User        user
 * @property  \Arcanesoft\Tracker\Models\Referer  referer
 */
trait VisitorPresenter
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

    /**
     * Get the `referer_host` attribute.
     *
     * @return string
     */
    public function getRefererHostAttribute()
    {
        return $this->hasReferer() ? $this->referer->host : trans('tracker::referers.undefined');
    }
}
