<?php

namespace App\Models;

use App\Enums\ZoneLogType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoneLogInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'info',
        'zone_log_id'
    ];
}
