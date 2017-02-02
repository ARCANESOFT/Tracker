<?php namespace Arcanesoft\Tracker\Http\Controllers\Admin;

use Arcanesoft\Core\Http\Controllers\AdminController;
use Arcanesoft\Core\Traits\Notifyable;

/**
 * Class     Controller
 *
 * @package  Arcanesoft\Tracker\Http\Controllers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class Controller extends AdminController
{
    /* ------------------------------------------------------------------------------------------------
     |  Traits
     | ------------------------------------------------------------------------------------------------
     */
    use Notifyable;

    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * The view namespace.
     *
     * @var string
     */
    protected $viewNamespace = 'tracker';

    /* ------------------------------------------------------------------------------------------------
     |  Constructor
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Instantiate the controller.
     */
    public function __construct()
    {
        parent::__construct();

        $this->addBreadcrumbRoute('Tracker', 'admin::tracker.stats.index');
    }
}
