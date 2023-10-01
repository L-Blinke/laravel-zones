<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromQuery, WithTitle, WithHeadings
{
    public function query()
    {
        return User::query();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Surname',
            'Email',
            'CUIL/CUIT',
            'Role',
        ];
    }

    public function title(): string
    {
        return 'Users';
    }
}
