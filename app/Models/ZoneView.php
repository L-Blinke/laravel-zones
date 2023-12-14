<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ZoneView extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
    ];

    public static function Render(int $dashboardId)
    {
        return Dashboard::find($dashboardId)->returnView();
    }

    public function zones() : HasMany
    {
        return $this->hasMany(EmergencyRoom::class, 'zone_id');
    }

    public function config() : HasMany
    {
        return $this->hasMany(DashboardConfig::class);
    }
}
