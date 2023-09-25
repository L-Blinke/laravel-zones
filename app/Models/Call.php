<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Call extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'zone_id',
        'petitioner_id',
        'resolutionStatus',
        'completionDate'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'completionDate' => 'datetime',
    ];

    public static function resolveCall($id, $status)
    {
        $call = Call::find($id)->get();
        $call->resolutionStatus = $status;
        $call->completionDate = Carbon::now();
        $call->save();
    }
}
