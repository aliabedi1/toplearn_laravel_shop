<?php

namespace App\Models\Market;

use App\Models\Market\CartItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guarantee extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name','product_id','price_increase','status'];

    
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class , 'guarantee_id');
    }


    public function product()
    {
        return $this->belongsTo(Product::class , 'product_id');
    }


    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'guarantee_id');
    }
}
