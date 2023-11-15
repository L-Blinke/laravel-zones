<?php

namespace App\View\Components\Dashboard\Zones;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ZoneDetails extends Component
{
    public $model;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.zones.zone-details');
    }
}
