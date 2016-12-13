<?php namespace Arcanesoft\Tracker\Models;

use Arcanedev\LaravelTracker\Models\Session as BaseSession;

/**
 * Class     Session
 *
 * @package  Arcanesoft\Tracker\Models
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Session extends BaseSession
{
    /* ------------------------------------------------------------------------------------------------
     |  Traits
     | ------------------------------------------------------------------------------------------------
     */
    use Presenters\SessionPresenter;

    /* ------------------------------------------------------------------------------------------------
     |  Check Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Check if the user exists.
     *
     * @return bool
     */
    public function hasUser()
    {
        return ! is_null($this->user);
    }
}
