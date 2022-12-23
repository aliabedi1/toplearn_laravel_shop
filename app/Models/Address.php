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


    public function orders()
    {
        return $this->hasMany(Order::class, 'address_id');
    }

    
    public function city()
    {
        return $this->belongsTo(City::class , 'city_id');
    }
}
