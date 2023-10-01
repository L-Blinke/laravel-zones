<?php

namespace App\Exports;

use App\Models\MedicalInsurance;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class MedicalInsuranceExport implements FromQuery, WithTitle, WithHeadings
{
    public function query()
    {
        return MedicalInsurance::query();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Medical insurance name',
        ];
    }

    public function title(): string
    {
        return 'Medical insurances';
    }
}
