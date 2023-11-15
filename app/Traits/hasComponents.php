<?php

namespace App\Traits;

trait hasComponents
{
    public function getComponent()
    {
        if($this->type == "List"){
            return view('components.dashboard.zones.components.list-component', ['data' => $this->zoneData, 'config' => $this->component_config]);
        }else if($this->type == "View"){
            return view('components.' . $this->component_config['ComponentName'], ['data' => $this->zoneData]);
        }
    }
}
