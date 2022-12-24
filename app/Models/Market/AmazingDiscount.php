<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AmazingDiscount extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'amazing_sales';

    protected $fillable = ['product_id','percent','status','start_date','end_date'];


    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class , 'amazing_sale_id');
    }

}
