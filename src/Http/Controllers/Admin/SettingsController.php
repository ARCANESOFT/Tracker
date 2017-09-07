<?php namespace Arcanesoft\Tracker\Http\Controllers\Admin;

use Illuminate\Support\Arr;

/**
 * Class     SettingsController
 *
 * @package  Arcanesoft\Tracker\Http\Controllers\Admin
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class SettingsController extends Controller
{
    /* -----------------------------------------------------------------
     |  Constructor
     | -----------------------------------------------------------------
     */

    /**
     * SettingsController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->setCurrentPage('tracker-settings');
        $this->addBreadcrumbRoute(trans('tracker::settings.titles.settings'), 'admin::tracker.settings.index');
    }

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    public function index()
    {
        $trackers = Arr::get(config('arcanesoft.tracker', []), 'tracking', []);

//        $this->setTitle('Settings - Tracker');

        return $this->view('admin.settings.index', compact('trackers'));
    }
}
