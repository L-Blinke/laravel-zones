<?php

namespace App\Models;

use App\Exports\UsersExport;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'cuil',
        'privilege'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the zone associated with the user.
     */
    public function zone(): HasOne
    {
        if ($this->privilege == "Nurse") {
            return $this->hasOne(Zone::class, 'nurse_id');
        }else{
            return $this->hasOne(Zone::class, 'patient_id');
        }
    }

    public function Export() {
        fopen(storage_path('app/public/tmp/users.xlsx'), "w");
        Excel::store((new UsersExport), storage_path('app/public/tmp/users.xlsx'));

        return '<a href="/internal/user/export" target="_blank" class="btn btn-primary" data-style="zoom-in"> <span><i class="la la-file"></i> Exportar user</span> </a>';
    }

    public function Import() {
        return '<a href="/internal/user/import" target="_blank" class="btn btn-primary" data-style="zoom-in"> <span><i class="la la-file"></i> Importar user</span> </a>';
    }
}
