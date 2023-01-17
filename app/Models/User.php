<?php

namespace App\Models;

use App\Models\Market\CartItem;
use App\Models\Otp;
use App\Models\User\Role;
use App\Models\Market\Copan;
use App\Models\Market\Order;
use App\Models\Ticket\Ticket;
use App\Models\Market\Payment;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Ticket\TicketAdmin;
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
        'slug',
        'activation_date',
        'user_type',
        'current_team_id',
        'remember_token',
        'national_code',
        'profile_photo_path',
        'email_verified_at',
        'mobile_verified_at',
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


    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }


    public function getProfilePhotoPathValueAttribute()
    {
        $result = $this->profile_photo_path;

        if($result == null)
        {
            $result = 'admin-assets/images/no-avatar.png';
        }

        return $result;

    }


    public function ticketAdmin()
    {
        return $this->hasOne(TicketAdmin::class);
    }

    
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
    


    public function roles()
    {
        return $this->hasMany(Role::class);
    }


    
    public function payments()
    {
        return $this->hasMany(Payment::class,'user_id');
    }


    public function copans()
    {
        return $this->hasMany(Copan::class,'user_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class,'user_id');
    }

    
    public function otps()
    {
        return $this->hasMany(Otp::class, 'user_id');
    }


    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'user_id');
    }
    
}
