<?php namespace Arcanesoft\Tracker\Http\Controllers\Admin;

use Arcanesoft\Core\Bases\AdminController as BaseController;
use Arcanesoft\Core\Traits\Notifyable;

/**
 * Class     Controller
 *
 * @package  Arcanesoft\Tracker\Http\Controllers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class Controller extends BaseController
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