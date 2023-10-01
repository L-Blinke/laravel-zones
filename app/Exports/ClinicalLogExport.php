<?php

namespace App\Exports;

use App\Models\ClinicalLog;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class ClinicalLogExport implements FromQuery, WithTitle, WithHeadings
{
    public function query()
    {
        return ClinicalLog::query();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Patient ID',
            'Gender',
            'Sex',
            'Born Date',
            'Age',
            'Address',
            'Phone number',
            'Blood group',
            'Medical Insurance ID',
            'Emergency phone number',
        ];
    }

    public function title(): string
    {
        return 'Clinical logs';
    }
}
