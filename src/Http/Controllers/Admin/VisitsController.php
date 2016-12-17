<?php namespace Arcanesoft\Tracker\Http\Controllers\Admin;

use Arcanesoft\Tracker\Models\Session;

/**
 * Class     VisitsController
 *
 * @package  Arcanesoft\Tracker\Http\Controllers\Admin
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class VisitsController extends Controller
{
    /* ------------------------------------------------------------------------------------------------
     |  Constructor
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * VisitsController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->addBreadcrumbRoute('Views', 'admin::tracker.visits.index');
        $this->setCurrentPage('tracker-visits');
    }

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    public function index()
    {
        $this->setTitle('Visits list - Tracker');

        $sessions = Session::with(['user', 'device', 'agent', 'geoip', 'referer', 'cookie', 'language', 'activities'])
            ->paginate(50);

        return $this->view('foundation.visits.index', compact('sessions'));
    }
}
