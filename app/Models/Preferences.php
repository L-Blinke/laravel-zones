<?php

namespace App\Models;

use App\Enums\ZonePreferencesTypesEnum;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preferences extends Model
{
    use CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'zonePreference'
    ];

    protected $casts = [
        'zonePreference' => ZonePreferencesTypesEnum::class
    ];
}
