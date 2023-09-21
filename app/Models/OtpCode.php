<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OtpCode extends Model
{
    use CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'passphrase',
        'type',
        'zone_id'
    ];

    /**
     * Get the nurse associated with the zone.
     */
    public function zone(): BelongsTo
    {
        return $this->belongsTo(Zone::class, 'zone_id');
    }
}
