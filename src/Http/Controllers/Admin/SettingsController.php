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
    /* ------------------------------------------------------------------------------------------------
     |  Constructor
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * SettingsController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->addBreadcrumbRoute('Settings', 'admin::tracker.settings.index');
        $this->setCurrentPage('tracker-settings');
    }

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    public function index()
    {
        $this->setTitle('Settings - Tracker');

        $configs = config('arcanesoft.tracker', []);

        return $this->view('admin.settings.index', [
            'trackers' => Arr::get($configs, 'tracking', []),
        ]);
    }
}
