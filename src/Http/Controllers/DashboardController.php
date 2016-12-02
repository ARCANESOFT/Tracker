<?php namespace Arcanesoft\Tracker\Http\Controllers;

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

        $this->setCurrentPage('tracker');
    }

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    public function index()
    {
        $this->setTitle('Tracker');

        return $this->view('foundation.dashboard');
    }
}
