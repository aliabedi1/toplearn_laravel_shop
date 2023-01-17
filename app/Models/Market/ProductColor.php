<?php

namespace App\Models\Market;

use App\Models\Market\CartItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductColor extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'product_colors';

    protected $fillable = ['color_name','color','product_id','price_increase','sold_number','frozen_number','marketable_number'];


    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }


    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'color_id');
    }

    
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class , 'color_id');
    }
}
