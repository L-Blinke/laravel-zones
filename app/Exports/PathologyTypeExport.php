<?php

namespace App\Exports;

use App\Models\PathologyType;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class PathologyTypeExport implements FromQuery, WithTitle, WithHeadings
{
    public function query()
    {
        return PathologyType::query();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Pathology name',
        ];
    }

    public function title(): string
    {
        return 'Pathology Types';
    }
}
