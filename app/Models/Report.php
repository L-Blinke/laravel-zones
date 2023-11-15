<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    use CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'reported_id',
        'type'
    ];

    public function Show() {
        return '<a href="/internal/document/userResume/4" target="_blank" class="btn btn-sm btn-link"> <span><i class="la la-eye"></i> Ver reporte</span> </a>';
    }

    public function nurse(): BelongsTo
    {
        return $this->belongsTo(EmergencyRoom::class, 'reported_id');
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(EmergencyRoom::class, 'reported_id');
    }

    public function emergencyRoom(): BelongsTo
    {
        return $this->belongsTo(EmergencyRoom::class, 'reported_id');
    }
}
