<?php

namespace App\Livewire\Admin\Actions\Import;

use Livewire\Component;
use App\Imports\MedicalInsuranceImport;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class MedicalInsurancesImportComponent extends Component
{
    use WithFileUploads;
    public $excel;
    public function save()
    {
        Excel::import(new MedicalInsuranceImport, $this->excel);

        $this->dispatch('saved');
    }
    public function render()
    {
        return view('livewire.admin.actions.import.medical-insurances-import');
    }
}
