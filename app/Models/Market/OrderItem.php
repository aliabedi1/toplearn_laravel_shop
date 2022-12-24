<?php

namespace App\Models\Market;

use App\Models\Market\Order;
use App\Models\Market\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Market\OrderItemSelectedAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory,SoftDeletes;


    
    public function order()
    {
        return $this->belongsTo(Order::class , 'order_id');
    }

    public function singleProduct()
    {
        return $this->belongsTo(Product::class , 'product_id');
    }


    public function amazingSale()
    {
        return $this->belongsTo(AmazingDiscount::class , 'amazing_sale_id');
    }


    public function color()
    {
        return $this->belongsTo(ProductColor::class , 'color_id');
    }

    
    public function guarantee()
    {
        return $this->belongsTo(Guarantee::class , 'guarantee_id');
    }


    public function orderItemAttributes()
    {
        return $this->hasMany(OrderItemSelectedAttribute::class , 'order_item_id');
    }




}
