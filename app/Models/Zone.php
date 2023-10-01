<?php

namespace App\Models;

use App\Enums\CallTypesEnum;
use Carbon\Carbon;
use App\Enums\ZoneLogEnum;
use App\Enums\ZoneLogType;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Zone extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'nurse_id',
        'patient_id'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function nurse(): BelongsTo
    {
        return $this->belongsTo(User::class, 'nurse_id');
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function calls(): HasMany
    {
        return $this->hasMany(Call::class, 'zone_id');
    }

    public function eventsInfo() : HasMany
    {
        return $this->hasManyTrough(ZoneLog::class, 'foreign_id')->where('typeFor', new ZoneLogType(ZoneLogType::ForDispatch));
    }

    public function callsThroughDate($date1, $date2)
    {
        return $this->calls()
            ->whereBetween('created_at', [Carbon::parse($date1), Carbon::parse($date2)])
            ->whereBetween('completed_at', [Carbon::parse($date1), Carbon::parse($date2)])
            ->get();
    }

    public function callsThroughType($type)
    {
        return $this->calls()
            ->where('type', $type)
            ->get();
    }

    public function callsThroughZoneName($zone_name_id)
    {
        return $this->calls()
            ->where('zone_name_id', $zone_name_id)
            ->get();
    }

    public function responseTimeAverageThroughDate($date1, $date2): float
    {
        return $this->callsThroughDate($date1, $date2)->map(function ($item) {
            return $item->responseTime();
        })->avg();
    }

    public function responseTimeAverageThroughZoneName($zone_name_id): float
    {
        return $this->callsThroughZoneName($zone_name_id)->map(function ($item) {
            return $item->responseTime();
        })->avg();
    }

    public function responseTimeAverageThroughType($type): float
    {
        return $this->callsThroughType($type)->map(function ($item) {
            return $item->responseTime();
        })->avg();
    }

    public function responseTimeAverage(): float
    {
        return $this->calls->map(function ($item) {
            return $item->responseTime();
        })->avg();
    }

    public function asign()
    {
        return '<a href="http://localhost:8000/admin/zone/'.$this->id.'/asign" class="btn btn-sm btn-link"><span><i class="la la-star-of-life"></i> Asignar paciente</span></a>';
    }


    public function statusClasses()
    {
        if (count($this->calls->where('completed_at', null)) > 0) {
            switch ($this->calls->where('completed_at', null)->first()->type){
                case CallTypesEnum::GeneralCode:
                    return "scale-105 bg-yellow-400";
                case CallTypesEnum::BlueCode:
                    return "scale-110 bg-blue-400";
            }
        }

        if ($this->nurse()->exists() && $this->patient()->exists()) {
            return "bg-green-400";
        }else if($this->nurse()->exists()){
            return "bg-slate-600";
        }else{
            return "scale-90 bg-slate-800";
        }
    }

    public function asignPatient(int $patient_id, string $message)
    {
        $this->patient_id = $patient_id;
        $this->save();
        ZoneLogInfo::create([
            "info" => $message,
            "zone_log_id" => ZoneLog::create([
                "type" => new ZoneLogEnum(ZoneLogEnum::PatientDesignated),
                "typeFor" => new ZoneLogType(ZoneLogType::ForDispatch),
                "zone_id" => $this->id,
                "foreign_id" => $this->patient_id
            ])->id
        ]);
    }

    public function dispatchPatient(string $message)
    {
        ZoneLogInfo::create([
            "info" => $message,
            "zone_log_id" => ZoneLog::create([
                "type" => new ZoneLogEnum(ZoneLogEnum::PatientDispatched),
                "typeFor" => new ZoneLogType(ZoneLogType::ForDispatch),
                "zone_id" => $this->id,
                "foreign_id" => $this->patient_id
            ])->id
        ]);
        $this->patient_id = null;
        $this->save();
    }

    public function dispatchAndAsignPatient(int $patient_id, string $dispatchMessage, string $assignationMessage)
    {
        ZoneLogInfo::create([
            "info" => $dispatchMessage,
            "zone_log_id" => ZoneLog::create([
                "type" => new ZoneLogEnum(ZoneLogEnum::PatientDispatched),
                "typeFor" => new ZoneLogType(ZoneLogType::ForDispatch),
                "zone_id" => $this->id,
                "foreign_id" => $this->patient_id
            ])->id
        ]);
        $this->patient_id = $patient_id;
        $this->save();
        ZoneLogInfo::create([
            "info" => $assignationMessage,
            "zone_log_id" => ZoneLog::create([
                "type" => new ZoneLogEnum(ZoneLogEnum::PatientDesignated),
                "typeFor" => new ZoneLogType(ZoneLogType::ForDispatch),
                "zone_id" => $this->id,
                "foreign_id" => $this->patient_id
            ])->id
        ]);
    }
}
