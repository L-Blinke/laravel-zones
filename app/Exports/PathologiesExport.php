<?php

namespace App\Exports;

use App\Models\Pathology;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class PathologiesExport implements FromQuery, WithTitle, WithHeadings
{
    public function query()
    {
        return Pathology::query();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Clinical Log ID',
            'Pathology ID'
        ];
    }

    public function title(): string
    {
        return 'Pathologies';
    }
}
