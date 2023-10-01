<?php

namespace App\View\Components\dashboard\zones;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Zone;

class zoneRow extends Component
{
    public Zone $model;
    /**
     * Create a new component instance.
     */
    public function __construct(public int $zone)
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $model = Zone::first();

        return view('components.dashboard.zones.zone-row');
    }
}
