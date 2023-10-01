<?php

namespace App\Livewire\Admin\Actions\Import;

use Livewire\Component;
use App\Imports\ClinicalLogImport;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class ClinicalLogsImportComponent extends Component
{
    use WithFileUploads;
    public $excel;
    public function save()
    {
        Excel::import(new ClinicalLogImport, $this->excel);

        $this->dispatch('saved');
    }
    public function render()
    {
        return view('livewire.admin.actions.import.clinical-logs-import');
    }
}
