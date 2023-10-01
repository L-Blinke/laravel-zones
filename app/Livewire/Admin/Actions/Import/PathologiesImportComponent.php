<?php

namespace App\Livewire\Admin\Actions\Import;

use Livewire\Component;
use App\Imports\PathologiesImport;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class PathologiesImportComponent extends Component
{
    use WithFileUploads;
    public $excel;
    public function save()
    {
        Excel::import(new PathologiesImport, $this->excel);

        $this->dispatch('saved');
    }
    public function render()
    {
        return view('livewire.admin.actions.import.pathologies-import');
    }
}
