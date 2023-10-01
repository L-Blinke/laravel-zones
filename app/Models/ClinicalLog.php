<?php

namespace App\Models;

use App\Exports\ClinicalLogExport;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Maatwebsite\Excel\Facades\Excel;

class ClinicalLog extends Model
{
    use CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'gender',
        'sex',
        'bornDate',
        'age',
        'address',
        'phone',
        'bloodGroup',
        'medical_insurance_id',
        'emergencyPhone',
    ];

    /**
     * Get the zone associated with the user.
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the zone associated with the user.
     */
    public function medicalInsurance(): BelongsTo
    {
        return $this->belongsTo(MedicalInsurance::class, 'medical_insurance_id');
    }

        /**
     * Get the zone associated with the user.
     */
    public function pathologies(): HasMany
    {
        return $this->hasMany(Pathology::class, 'clinical_log_id');
    }

    public function Export() {
        fopen(storage_path('app/public/tmp/clinicalLogs.xlsx'), "w");
        Excel::store((new ClinicalLogExport), storage_path('app/public/tmp/clinicalLogs.xlsx'));

        return '<a href="/internal/clinical-logs/export" target="_blank" class="btn btn-primary" data-style="zoom-in"> <span><i class="la la-file"></i> Exportar historiales clínicos</span> </a>';
    }

    public function Import() {
        return '<a href="/internal/clinical-logs/import" target="_blank" class="btn btn-primary" data-style="zoom-in"> <span><i class="la la-file"></i> Importar historiales clínicos</span> </a>';
    }
}
