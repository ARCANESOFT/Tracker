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
    /* -----------------------------------------------------------------
     |  Constructor
     | -----------------------------------------------------------------
     */

    /**
     * VisitorsController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->setCurrentPage('tracker-visitors');
        $this->addBreadcrumbRoute(trans('tracker::visitors.titles.visitors'), 'admin::tracker.visitors.index');
    }

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    public function index()
    {
        $visitors = Visitor::with(['user', 'device', 'agent', 'geoip', 'referer', 'cookie', 'language', 'activities'])
            ->paginate(50);

        $this->setTitle($title = trans('tracker::visitors.titles.visitors-list'));
        $this->addBreadcrumb($title);

        return $this->view('admin.visitors.index', compact('visitors'));
    }
}
