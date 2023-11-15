<?php

namespace App\Models;

use App\Exports\PathologiesExport;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Maatwebsite\Excel\Facades\Excel;

class Pathology extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'clinical_log_id',
        'pathology_type_id'
    ];

    public function pathologyType(): BelongsTo
    {
        return $this->belongsTo(PathologyType::class, 'pathology_type_id');
    }

    public function clinicalLog(): BelongsTo
    {
        return $this->belongsTo(ClinicalLog::class, 'clinical_log_id');
    }

    public function Export() {
        try {
        fopen(storage_path('app/public/tmp/pathologies.xlsx'), "w");
        Excel::store((new PathologiesExport), storage_path('app/public/tmp/pathologies.xlsx'));

        return '<a href="/internal/pathologies/export" target="_blank" class="btn btn-primary" data-style="zoom-in"> <span><i class="la la-file"></i> Exportar patologías</span> </a>';
        } catch (\Throwable $th) {
            return '';
        }
    }

    public function Import() {
        return '<a href="/internal/pathologies/import" target="_blank" class="btn btn-primary" data-style="zoom-in"> <span><i class="la la-file"></i> Importar patologías</span> </a>';
    }
}
