<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CallsExport;
use App\Models\Call;
use Carbon\Carbon;

class CallTableBackup extends DataTableComponent
{
    protected $model = Call::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->hideIf(true),
            Column::make("Type", "type")
                ->sortable(),
            Column::make("Zone id", "zone_id")
                ->sortable(),
        ];
    }

    public function bulkActions(): array
    {
        return [
            'solveSuccess' => 'Solved succesfully',
            'solveUnsuccess' => 'Solved unsuccesfully',
            'export' => 'Export',
        ];
    }

    public function solveSuccess()
    {
        Call::whereIn('id', $this->getSelected())->update(['resolutionStatus' => "Solved succesfully", 'completed_at' => Carbon::now()]);

        $this->clearSelected();
    }

    public function solveUnsuccess()
    {
        Call::whereIn('id', $this->getSelected())->update(['resolutionStatus' => "Solved unsuccesfully", 'completed_at' => Carbon::now()]);

        $this->clearSelected();
    }

    public function export()
    {
        $calls = $this->getSelected();

        $this->clearSelected();

        fopen(storage_path('app/public/tmp/calls.xlsx'), "w");
        Excel::store((new CallsExport)->ids($calls), storage_path('app/public/tmp/calls.xlsx'));

        return response()->download(storage_path('app/public/tmp/calls.xlsx'));
    }
}
