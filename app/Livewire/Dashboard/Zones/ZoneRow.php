<?php

namespace App\Livewire\Dashboard\Zones;

use App\Models\Zone;
use Livewire\Component;

class ZoneRow extends Component
{
    public $zone;
    public $model;
    public function render()
    {
        $model = Zone::find($this->zone);

        return view('livewire.dashboard.zones.zone-row');
    }
}
