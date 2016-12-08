<?php namespace Arcanesoft\Tracker\Bases;

use Arcanedev\Support\Bases\Migration as BaseMigration;

/**
 * Class     Migration
 *
 * @package  Arcanesoft\Tracker\Bases
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class Migration extends BaseMigration
{
    /* ------------------------------------------------------------------------------------------------
     |  Constructor
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Migration constructor.
     */
    public function __construct()
    {
        $this->setConnection(config('arcanesoft.tracker.database.connection', null))
             ->setPrefix(config('arcanesoft.tracker.database.prefix', 'tracker_'));
    }
}
