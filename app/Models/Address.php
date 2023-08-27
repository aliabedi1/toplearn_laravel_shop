<?php

namespace App\Models;

use App\Models\City;
use App\Models\Market\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['user_id','city_id','postal_code','address','no','unit','recipient_first_name','recipient_last_name','mobile','status'];


    public function orders()
    {
        return $this->hasMany(Order::class, 'address_id');
    }

    
    public function city()
    {
        return $this->belongsTo(City::class , 'city_id');
    }


    public function getFullNameAttribute()
    {
        return "$this->recipient_first_name  $this->recipient_last_name";
    }
}
