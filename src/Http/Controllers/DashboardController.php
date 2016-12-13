<?php namespace Arcanesoft\Tracker\Http\Controllers;
use Arcanedev\LaravelTracker\Models\SessionActivity;

/**
 * Class     DashboardController
 *
 * @package  Arcanesoft\Tracker\Http\Controllers
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

        $activities = SessionActivity::all()->toArray();

        return $this->view('foundation.dashboard', compact('activities'));
    }
}
