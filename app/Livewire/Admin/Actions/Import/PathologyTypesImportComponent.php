<?php

namespace App\Livewire\Admin\Actions\Import;

use Livewire\Component;
use App\Imports\PathologyTypeImport;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class PathologyTypesImportComponent extends Component
{
    use WithFileUploads;
    public $excel;
    public function save()
    {
        Excel::import(new PathologyTypeImport, $this->excel);

        $this->dispatch('saved');
    }
    public function render()
    {
        return view('livewire.admin.actions.import.pathology-types-import');
    }
}
