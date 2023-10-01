<?php

namespace App\Models;

use App\Enums\CallTypesEnum;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OtpCode extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'passphrase',
        'type',
        'zone_id'
    ];

    protected $casts = [
        'type' => CallTypesEnum::class,
    ];

    public function zone(): BelongsTo
    {
        return $this->belongsTo(Zone::class, 'zone_id');
    }
}
