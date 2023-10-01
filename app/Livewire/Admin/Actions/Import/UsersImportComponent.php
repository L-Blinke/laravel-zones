<?php

namespace App\Livewire\Admin\Actions\Import;

use Livewire\Component;
use App\Imports\UsersImport;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class UsersImportComponent extends Component
{
    use WithFileUploads;
    public $excel;
    public function save()
    {
        Excel::import(new UsersImport, $this->excel);

        $this->dispatch('saved');
    }
    public function render()
    {
        return view('livewire.admin.actions.import.users-import');
    }
}
