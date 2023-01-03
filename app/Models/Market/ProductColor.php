<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductColor extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'product_colors';

    protected $fillable = ['color_name','color','product_id','price_increase','sold_number','frozen_number','marketable_number'];


    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }


    
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class , 'color_id');
    }
}
