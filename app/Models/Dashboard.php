<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dashboard extends Model
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
        return $this->hasMany(Zone::class);
    }

    public function config() : HasMany
    {
        return $this->hasMany(DashboardConfig::class);
    }

    public function returnView()
    {
        return view('dashboard', ["zones" => $this->zones, "config" => $this->config]);
    }
}
