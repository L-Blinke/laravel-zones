<?php

namespace App\Livewire;

use App\Models\Call;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class SolveCall extends ModalComponent
{
    public Call $call;

    public function render()
    {
        return view('livewire.edit-user');
    }
}
