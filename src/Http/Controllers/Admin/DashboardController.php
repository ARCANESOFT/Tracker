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
    /* ------------------------------------------------------------------------------------------------
     |  Constructor
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->setCurrentPage('tracker-dashboard');
    }

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    public function index()
    {
        $this->setTitle('Tracker');

        $activities = VisitorActivity::all()->toArray();

        return $this->view('admin.dashboard', compact('activities'));
    }
}
