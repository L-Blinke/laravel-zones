<?php

namespace App\View\Components\dashboard\zones;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Zone;
use App\Models\Call;

class zoneRow extends Component
{
    public $zone;
    public $model;
    public $hasBlueCall;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->model = Zone::find($this->zone);

        $this->hasBlueCall = false;

        if (Call::where('type', '=', 'Blue')->where('zone_id', '=',$this->zone)->where('resolutionStatus', '=', null)) {
            $this->hasBlueCall = true;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.zones.zone-row');
    }
}
