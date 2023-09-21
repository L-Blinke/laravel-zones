<?php

namespace App\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Call;
use Illuminate\Database\Eloquent\Builder;

class CallTable extends DataTableComponent
{
    protected $model = Call::class;

    public $callZone;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        if (isset($this->callZone)) {
            return Call::query()
            ->where('zone_id', '=', $this->callZone);
        } else {
            return Call::query();
        }

    }

    public function columns(): array
    {
        return [
            Column::make("Type", "type")
                ->sortable(),
            Column::make("Zone id", "zone_id")
                ->sortable(),
            Column::make("Petitioner id", "petitioner_id")
                ->sortable(),
            Column::make("Solve status", "resolutionStatus")
                ->sortable(),
            Column::make("Solved at", "completionDate")
                ->sortable(),
            Column::make("Made at", "created_at")
                ->sortable(),
        ];
    }
}
