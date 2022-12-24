<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guarantee extends Model
{
    use HasFactory,SoftDeletes;


    
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class , 'guarantee_id');
    }
}
