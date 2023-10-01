<?php

namespace App\Models;

use App\Enums\ZoneLogEnum;
use App\Enums\ZoneLogType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ZoneLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'typeFor',
        'zone_id',
        'foreign_id'
    ];

    protected $with = ['info'];

    protected $casts = [
        'type' => ZoneLogEnum::class,
        'typeFor' => ZoneLogType::class
    ];

    public function info() : HasOne
    {
        return $this->hasOne(ZoneLogInfo::class);
    }

    public function zone() : BelongsTo
    {
        return $this->belongsTo(Zone::class);
    }

    public function call() : BelongsTo
    {
        return $this->belongsTo(Call::class, 'foreign_id')->where('typeFor', new ZoneLogType(ZoneLogType::ForCall));
    }
}
