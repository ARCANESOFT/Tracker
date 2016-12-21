<?php namespace Arcanesoft\Tracker\Http\Controllers\Admin;

use Arcanesoft\Tracker\Models\Visitor;

/**
 * Class     VisitorsController
 *
 * @package  Arcanesoft\Tracker\Http\Controllers\Admin
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class VisitorsController extends Controller
{
    /* ------------------------------------------------------------------------------------------------
     |  Constructor
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * VisitorsController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->addBreadcrumbRoute('Visitors', 'admin::tracker.visitors.index');
        $this->setCurrentPage('tracker-visitors');
    }

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    public function index()
    {
        $this->setTitle('Visitors list - Tracker');

        $visitors = Visitor::with(['user', 'device', 'agent', 'geoip', 'referer', 'cookie', 'language', 'activities'])
            ->paginate(50);

        return $this->view('admin.visitors.index', compact('visitors'));
    }
}
