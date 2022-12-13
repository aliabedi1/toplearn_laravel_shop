<?php

namespace App\Models;

use App\Models\Ticket\Ticket;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Ticket\TicketAdmin;
use App\Models\User\Role;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile',
        'user_type',
        'password',
        'status',
        'activation',
        'profile_photo_path',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function getFullnameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }


    public function ticketAdmin()
    {
        return $this->hasOne(TicketAdmin::class);
    }

    
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
    


    public function role()
    {
        return $this->hasMany(Role::class);
    }
}
