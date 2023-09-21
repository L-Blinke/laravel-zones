<?php

namespace App\Livewire\Preferences;

use Livewire\Component;
use App\Models\Preferences;

class UpdateDashboardPreferences extends Component
{
    public $selectedInput;

    public function save(){

        $this->dispatch('saved');

        if (Preferences::first() != null) {
            $model = Preferences::first();

            $model->zonePreference = $this->selectedInput;
            $model->save();

        }else{
            $model = new Preferences();
            $model->zonePreference = $this->selectedInput;
            $model->save();
        }

    }
    public function render()
    {
        return view('livewire.preferences.update-dashboard-preferences');
    }
}
