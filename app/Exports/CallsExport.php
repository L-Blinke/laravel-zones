<?php

namespace App\Exports;

use App\Models\Call;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;

class CallsExport implements FromQuery, WithTitle
{
    use Exportable;

    protected array $ids;

    public function ids(array $ids)
    {
        $this->ids = $ids;

        return $this;
    }

    public function query()
    {
        if (isset($this->ids)) {
            return Call::query()->whereIn('id', $this->ids);
        }
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Calls';
    }
}
