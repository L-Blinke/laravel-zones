<?php

namespace App\Livewire\Dashboard;

use App\Enums\ZonePreferencesTypesEnum;
use App\Models\Zone;
use App\Models\Preferences;
use Livewire\Component;

class ZonesView extends Component
{
    public $count;
    public $totalCount;
    public $first;
    public $index;
    public $columns;
    public $spaces;
    public function refresh(){
        $this->dispatch('refreshDatatable');

        switch (Preferences::first()->zonePreference) {
            case ZonePreferencesTypesEnum::IDistribution:
                switch (Zone::count()) {
                    case 1:
                        $this->columns = [
                            1
                        ];
                        break;
                    case 2:
                        $this->columns = [
                            1,1
                        ];
                        break;
                    case 3:
                        $this->columns = [
                            1,1,1
                        ];
                        break;
                    case 4:
                        $this->columns = [
                            2,1,1
                        ];
                        break;
                    case 5:
                        $this->columns = [
                            2,1,2
                        ];
                        break;
                    case 6:
                        $this->columns = [
                            3,1,2
                        ];
                        break;
                    case 7:
                        $this->columns = [
                            3,1,3
                        ];
                        break;
                    case 8:
                        $this->columns = [
                            3,1,1,3
                        ];
                        break;
                    case 9:
                        $this->columns = [
                            4,1,1,3
                        ];
                        break;
                    case 10:
                        $this->columns = [
                            4,1,1,1,3
                        ];
                        break;
                    case 11:
                        $this->columns = [
                            4,1,1,1,4
                        ];
                        break;
                    case 12:
                        $this->columns = [
                            5,1,1,1,4
                        ];
                        break;
                    case 13:
                        $this->columns = [
                            5,1,1,1,1,4
                        ];
                        break;
                    case 14:
                        $this->columns = [
                            5,1,1,1,1,5
                        ];
                        break;
                    case 15:
                        $this->columns = [
                            6,1,1,1,1,5
                        ];
                        break;
                    case 16:
                        $this->columns = [
                            6,1,1,1,1,6
                        ];
                        break;
                    case 17:
                        $this->columns = [
                            6,1,2,1,1,6
                        ];
                        $this->spaces = [
                            [],[],[2],[],[],[]
                        ];
                        break;
                    case 18:
                        $this->columns = [
                            6,1,2,2,1,6
                        ];
                        $this->spaces = [
                            [],[],[2],[2],[],[]
                        ];
                        break;

                    default:
                        $this->columns = [
                            0
                        ];
                        break;
                }
                break;
            case ZonePreferencesTypesEnum::LDistribution:
                switch (Zone::count()) {
                    case 1:
                        $this->columns = [
                            1
                        ];
                        break;
                    case 2:
                        $this->columns = [
                            2
                        ];
                        break;
                    case 3:
                        $this->columns = [
                            2,1
                        ];
                        break;
                    case 4:
                        $this->columns = [
                            3,1
                        ];
                        break;
                    case 5:
                        $this->columns = [
                            3,1,1
                        ];
                        break;
                    case 6:
                        $this->columns = [
                            4,1,1
                        ];
                        break;
                    case 7:
                        $this->columns = [
                            4,1,1,1
                        ];
                        break;
                    case 8:
                        $this->columns = [
                            5,1,1,1
                        ];
                        break;
                    case 9:
                        $this->columns = [
                            5,1,1,1,1
                        ];
                        break;
                    case 10:
                        $this->columns = [
                            6,1,1,1,1
                        ];
                        break;
                    case 11:
                        $this->columns = [
                            6,1,1,1,1,1
                        ];
                        break;
                    case 12:
                        $this->columns = [
                            6,1,2,1,1,1
                        ];
                        $this->spaces = [
                            [],[],[2],[],[],[]
                        ];
                        break;
                    case 13:
                        $this->columns = [
                            6,1,2,2,1,1
                        ];
                        $this->spaces = [
                            [],[],[2],[2],[],[]
                        ];
                        break;
                    case 14:
                        $this->columns = [
                            6,1,3,2,1,1
                        ];
                        break;
                    case 15:
                        $this->columns = [
                            6,1,3,2,2,1
                        ];
                        $this->spaces = [
                            [],[],[2],[2],[2],[]
                        ];
                        break;
                    case 16:
                        $this->columns = [
                            6,1,4,2,2,1
                        ];
                        $this->spaces = [
                            [],[],[2],[2],[2],[]
                        ];
                        break;
                    case 17:
                        $this->columns = [
                            6,1,5,2,2,1
                        ];
                        $this->spaces = [
                            [],[],[2],[2],[2],[]
                        ];
                        break;
                    case 18:
                        $this->columns = [
                            6,1,5,2,2,2
                        ];
                        $this->spaces = [
                            [],[],[2],[2],[2],[2]
                        ];
                        break;

                    default:
                        $this->columns = [
                            0
                        ];
                        break;
                }
                break;
            case ZonePreferencesTypesEnum::IDistribution:
                switch (Zone::count()) {
                    case 1:
                        $this->columns = [
                            1
                        ];
                        break;
                    case 2:
                        $this->columns = [
                            2
                        ];
                        break;
                    case 3:
                        $this->columns = [
                            3
                        ];
                        break;
                    case 4:
                        $this->columns = [
                            3,0,1
                        ];
                        break;
                    case 5:
                        $this->columns = [
                            3,0,2
                        ];
                        break;
                    case 6:
                        $this->columns = [
                            3,0,3
                        ];
                        break;
                    case 7:
                        $this->columns = [
                            3,0,3,0,1
                        ];
                        break;
                    case 8:
                        $this->columns = [
                            3,0,3,0,2
                        ];
                        break;
                    case 9:
                        $this->columns = [
                            3,0,3,0,3
                        ];
                        break;
                    case 10:
                        $this->columns = [
                            4,0,3,0,3
                        ];
                        break;
                    case 11:
                        $this->columns = [
                            4,0,4,0,3
                        ];
                        break;
                    case 12:
                        $this->columns = [
                            4,0,4,0,4
                        ];
                        break;
                    case 13:
                        $this->columns = [
                            5,0,4,0,4
                        ];
                        break;
                    case 14:
                        $this->columns = [
                            5,0,5,0,4
                        ];
                        break;
                    case 15:
                        $this->columns = [
                            5,0,5,0,5
                        ];
                        break;
                    case 16:
                        $this->columns = [
                            6,0,5,0,5
                        ];
                        break;
                    case 17:
                        $this->columns = [
                            6,0,6,0,5
                        ];
                        break;
                    case 18:
                        $this->columns = [
                            6,0,6,0,6
                        ];
                        break;

                    default:
                        $this->columns = [
                            0
                        ];
                        break;
                }
                break;
            case ZonePreferencesTypesEnum::EDistribution:
                switch (Zone::count()) {
                    case 1:
                        $this->columns = [
                            1
                        ];
                        break;
                    case 2:
                        $this->columns = [
                            2
                        ];
                        break;
                    case 3:
                        $this->columns = [
                            3
                        ];
                        break;
                    case 4:
                        $this->columns = [
                            3,1
                        ];
                        break;
                    case 5:
                        $this->columns = [
                            3,2
                        ];
                        $this->spaces = [
                            [],[2]
                        ];
                        break;
                    case 6:
                        $this->columns = [
                            4,2
                        ];
                        $this->spaces = [
                            [],[2,3]
                        ];
                        break;
                    case 7:
                        $this->columns = [
                            5,2
                        ];
                        $this->spaces = [
                            [],[2,3,4]
                        ];
                        break;
                    case 8:
                        $this->columns = [
                            5,3
                        ];
                        $this->spaces = [
                            [],[2,4]
                        ];
                        break;
                    case 9:
                        $this->columns = [
                            5,3,1
                        ];
                        $this->spaces = [
                            [],[2,4]
                        ];
                        break;
                    case 10:
                        $this->columns = [
                            5,3,2
                        ];
                        $this->spaces = [
                            [],[2,4],[2,3,4]
                        ];
                        break;
                    case 11:
                        $this->columns = [
                            5,3,3
                        ];
                        $this->spaces = [
                            [],[2,4],[2,4]
                        ];
                        break;
                    case 12:
                        $this->columns = [
                            6,3,3
                        ];
                        $this->spaces = [
                            [],[2,4,5],[2,4,5]
                        ];
                        break;
                    case 13:
                        $this->columns = [
                            6,4,3
                        ];
                        $this->spaces = [
                            [],[2,5],[2,4,5]
                        ];
                        break;
                    case 14:
                        $this->columns = [
                            6,4,4
                        ];
                        $this->spaces = [
                            [],[2,5],[2,5]
                        ];
                        break;
                    case 15:
                        $this->columns = [
                            6,4,4,1
                        ];
                        $this->spaces = [
                            [],[2,5],[2,5],[]
                        ];
                        break;
                    case 16:
                        $this->columns = [
                            6,4,4,2
                        ];
                        $this->spaces = [
                            [],[2,5],[2,5],[2,3,4,5]
                        ];
                        break;
                    case 17:
                        $this->columns = [
                            6,4,4,2,1
                        ];
                        $this->spaces = [
                            [],[2,5],[2,5],[2,3,4,5],[]
                        ];
                        break;
                    case 18:
                        $this->columns = [
                            6,4,4,2,2
                        ];
                        $this->spaces = [
                            [],[2,5],[2,5],[2,3,4,5],[2,3,4,5]
                        ];
                        break;

                    default:
                        $this->columns = [
                            0
                        ];
                        break;
                }
                break;
        }

        $this->count = Zone::count() / 4;
        $this->totalCount = Zone::count();
        $this->first = true;
    }
    public function render()
    {
        $this->refresh();

        $this->count = Zone::count() / 4;
        $this->totalCount = Zone::count();
        $this->first = true;

        return view('livewire.dashboard.zones-view');
    }
}
