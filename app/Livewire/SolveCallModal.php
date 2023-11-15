<?php

namespace App\Livewire;

use App\Models\Call;
use Livewire\Component;

class SolveCallModal extends Component
{
    public $excel;
    public $call;
    public function save()
    {
        $this->call->solve($this->excel);

        $this->emit('saved');
    }
    public function render()
    {
        return view('livewire.solve-call-modal');
    }
}
