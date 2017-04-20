<?php namespace Arcanesoft\Tracker\Models;

use Arcanedev\LaravelTracker\Models\Visitor as BaseVisitor;

/**
 * Class     Visitor
 *
 * @package  Arcanesoft\Tracker\Models
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Visitor extends BaseVisitor
{
    /* -----------------------------------------------------------------
     |  Traits
     | -----------------------------------------------------------------
     */

    use Presenters\VisitorPresenter;
}
