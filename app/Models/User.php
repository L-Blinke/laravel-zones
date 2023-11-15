<?php

namespace App\Models;

use App\Enums\ZoneLogType;
use Carbon\Carbon;
use App\Exports\UsersExport;
use App\Traits\HasData;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Maatwebsite\Excel\Facades\Excel;

class User extends Authenticatable
{
    use CrudTrait;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasData;

    protected $fillable = [
        'id',
        'name',
        'surname',
        'email',
        'password',
        'cuil',
        'privilege'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    public function zone(): HasMany|HasOne
    {
        if ($this->privilege == "Nurse") {
            return $this->HasMany(EmergencyRoom::class, 'nurse_id');
        }else{
            return $this->hasOne(EmergencyRoom::class, 'patient_id');
        }
    }

    public function clinicalLogData(): HasOne
    {
        return $this->hasOne(ClinicalLog::class, 'user_id');
    }

    public function nurseData(): User|null
    {
        if($this->zone->exists){
            return User::find($this->zone->nurse_id);
        }else{
            return null;
        }
    }

    public function calls(): HasManyThrough
    {
        return $this->hasManyThrough(Call::class, EmergencyRoom::class);
    }

    public function callsThroughDate($date1, $date2)
    {
        return $this->calls()
            ->whereBetween('created_at', [Carbon::parse($date1), Carbon::parse($date2)])
            ->whereBetween('completed_at', [Carbon::parse($date1), Carbon::parse($date2)])
            ->get();
    }

    public function callsThroughType($type)
    {
        return $this->calls()
            ->where('type', $type)
            ->get();
    }

    public function callsThroughZoneName($zone_name_id)
    {
        return $this->calls()
            ->where('zone_name_id', $zone_name_id)
            ->get();
    }

    public function responseTimeAverage(): float
    {
        return $this->calls->map(function ($item) {
            return $item->responseTime();
        })->avg();
    }

    public function responseTimeAverageThroughDate($date1, $date2): float
    {
        return $this->callsThroughDate($date1, $date2)->map(function ($item) {
            return $item->responseTime();
        })->avg();
    }

    public function responseTimeAverageThroughZoneName($zone_name_id): float
    {
        return $this->callsThroughZoneName($zone_name_id)->map(function ($item) {
            return $item->responseTime();
        })->avg();
    }

    public function responseTimeAverageThroughType($type): float
    {
        return $this->callsThroughType($type)->map(function ($item) {
            return $item->responseTime();
        })->avg();
    }

    public function stayEvents() : HasMany
    {
        return $this->hasMany(ZoneLog::class, 'foreign_id')->where('typeFor', new ZoneLogType(ZoneLogType::ForCall));
    }

    public function stayInfo() : HasMany
    {
        return $this->hasMany(ZoneLog::class, 'foreign_id')->where('typeFor', new ZoneLogType(ZoneLogType::ForDispatch));
    }

    public function Export() {
        try {
            fopen(storage_path('app/public/tmp/users.xlsx'), "w");
            Excel::store((new UsersExport), storage_path('app/public/tmp/users.xlsx'));

            return '<a href="/internal/users/export" target="_blank" class="btn btn-primary" data-style="zoom-in"> <span><i class="la la-file"></i> Exportar user</span> </a>';
        } catch (\Throwable $th) {
            return '';
        }
    }

    public function Import() {
        return '<a href="/internal/users/import" target="_blank" class="btn btn-primary" data-style="zoom-in"> <span><i class="la la-file"></i> Importar user</span> </a>';
    }
}
