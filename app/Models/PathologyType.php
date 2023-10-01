<?php

namespace App\Models;

use App\Exports\PathologyTypeExport;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;

class PathologyType extends Model
{
    use CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
    ];

    public function Export() {
        fopen(storage_path('app/public/tmp/pathologyTypes.xlsx'), "w");
        Excel::store((new PathologyTypeExport), storage_path('app/public/tmp/pathologyTypes.xlsx'));

        return '<a href="/internal/pathology-types/export" target="_blank" class="btn btn-primary" data-style="zoom-in"> <span><i class="la la-file"></i> Exportar tipo de patologías</span> </a>';
    }

    public function Import() {
        return '<a href="/internal/pathology-types/import" target="_blank" class="btn btn-primary" data-style="zoom-in"> <span><i class="la la-file"></i> Importar tipo de patologías</span> </a>';
    }
}
