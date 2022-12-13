<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Delivery extends Model
{
    use HasFactory,SoftDeletes;


    protected $table = 'delivery';

    protected $fillable = ['name','status','delivery_time_unit','delivery_time','amount',];

    
}
