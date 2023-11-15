<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use App\Enums\ComponentType;
use App\Traits\hasComponents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ZoneComponent extends Model
{
    use CrudTrait;
    use HasFactory;
    use hasComponents;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'type',
        'dashboard_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'type' => ComponentType::class
    ];

    /**
     * Get the zone associated with the user.
     */
    public function dashboard(): BelongsTo
    {
        return $this->belongsTo(Dashboard::class);
    }

    /**
     * Get the zone data associated with the component.
     */
    public function zoneData(): HasMany
    {
        return $this->hasMany(ZoneComponentData::class);
    }

    /**
     * Get the zone data associated with the component.
     */
    public function componentConfig(): HasMany
    {
        return $this->hasMany(ZoneComponentConfig::class);
    }

}
