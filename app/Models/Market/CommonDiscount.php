<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommonDiscount extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'common_discount';

    protected $fillable = ['title','percentage','discount_ceiling','minimal_order_amount','status','start_date','end_date'];


       
    public function orders()
    {
        return $this->hasMany(Order::class , 'common_discount_id');
    }
}
