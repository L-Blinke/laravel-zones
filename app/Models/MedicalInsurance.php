<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Exports\MedicalInsuranceExport;
use Maatwebsite\Excel\Facades\Excel;

class MedicalInsurance extends Model
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
        fopen(storage_path('app/public/tmp/medicalInsurances.xlsx'), "w");
        Excel::store((new MedicalInsuranceExport), storage_path('app/public/tmp/medicalInsurances.xlsx'));

        return '<a href="/internal/medical-insurances/export" target="_blank" class="btn btn-primary" data-style="zoom-in"> <span><i class="la la-file"></i> Exportar coberturas medicas</span> </a>';
    }

    public function Import() {
        return '<a href="/internal/medical-insurances/import" target="_blank" class="btn btn-primary" data-style="zoom-in"> <span><i class="la la-file"></i> Importar coberturas medicas</span> </a>';
    }
}
