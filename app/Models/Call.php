<?php

namespace App\Models;

use App\Enums\CallTypesEnum;
use App\Enums\ZoneLogType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Enums\ZoneLogEnum;
use App\Traits\HasData;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Call extends Model
{
    use HasFactory;
    use HasData;

    protected $fillable = [
        'type',
        'zone_id',
        'petitioner_id',
        'completed_at'
    ];

    protected $casts = [
        'completed_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'type' => CallTypesEnum::class
    ];

    public static function resolveCall($id, $status) : void
    {
        $call = Call::find($id)->get();
        $call->resolutionStatus = $status; $call->completed_at = Carbon::now();
        $call->save();
    }

    public function responseTime() : float
    {
        return round($this->created_at->floatDiffInSeconds($this->completed_at), 2);
    }

    public function eventsInfo() : HasMany
    {
        return $this->hasMany(ZoneLog::class, 'foreign_id')->where('forType', new ZoneLogType(ZoneLogType::ForCall));
    }

    public function solve(string $info = "null") : void
    {
        ZoneLogInfo::create(['info' => $info, 'zone_log_id' => (ZoneLog::create(['type' => new ZoneLogEnum(ZoneLogEnum::CallSolved), 'zone_id' => $this->zone_id, 'typeFor' => new ZoneLogType(ZoneLogType::ForCall), 'foreign_id' =>  $this->id]))->id]);
        $this->update(['resolutionStatus' => $info, 'completed_at' => Carbon::now()]);
        $this->save();
    }

    public static function clearCalls(int $zone) : void
    {
        ZoneLog::create(['type' => new ZoneLogEnum(ZoneLogEnum::CallChanged), 'zone_id' => $zone, 'foreign_id' => 0]);
        // ZoneLogInfo::create([

        // ]);
        Call::where('zone_id', $zone)->where('completed_at', null)->update(['completed_at' => Carbon::now(), 'resolutionStatus' => "Inconclusive"]);
    }

    public static function StartCall(CallTypesEnum $callType, int $zone_id, string $info = "null", int $petitioner_id = null) : void
    {
        ZoneLogInfo::create([
            'info' => $info,
            'zone_log_id' => (ZoneLog::create([
                'type' => new ZoneLogEnum(ZoneLogEnum::CallChanged),
                'typeFor' => new ZoneLogType(ZoneLogType::ForCall),
                'zone_id' => $zone_id,
                'foreign_id' => (Call::create([
                    'type' => $callType,
                    'zone_id' => $zone_id,
                    'petitioner_id' => $petitioner_id
                    ]))->id
                ]))->id
            ]);
    }

    public static function clearCallsAndStartCall(CallTypesEnum $callType, int $zone_id, string $info = "null", int $petitioner_id = null) : void
    {
        Call::clearCalls($zone_id);
        ZoneLogInfo::create([
            'info' => $info,
            'zone_log_id' => (ZoneLog::create([
                    'type' => new ZoneLogEnum(ZoneLogEnum::CallChanged),
                    'typeFor' => new ZoneLogType(ZoneLogType::ForCall),
                    'zone_id' => $zone_id,
                    'foreign_id' => (Call::create([
                            'type' => $callType,
                            'zone_id' => $zone_id,
                            'petitioner_id' => $petitioner_id
                            ]))->id
                    ]))->id
            ]);
    }
}
