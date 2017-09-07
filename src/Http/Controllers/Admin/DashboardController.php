<?php namespace Arcanesoft\Tracker\Http\Controllers\Admin;

use Arcanedev\LaravelTracker\Models\VisitorActivity;

/**
 * Class     DashboardController
 *
 * @package  Arcanesoft\Tracker\Http\Controllers\Admin
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class DashboardController extends Controller
{
    /* -----------------------------------------------------------------
     |  Constructor
     | -----------------------------------------------------------------
     */

    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->setCurrentPage('tracker-dashboard');
        $this->addBreadcrumbRoute(trans('tracker::dashboard.titles.statistics'), 'admin::tracker.stats.index');
    }

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    public function index()
    {
        $this->setTitle(trans('tracker::dashboard.titles.statistics'));

        return $this->view('admin.dashboard', [
            'activities' => VisitorActivity::all()->toArray(),
        ]);
    }
}
