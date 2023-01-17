<?php

namespace App\Models\Market;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'cart_items';

    protected $fillable = ['user_id','color_id','product_id','guarantee_id','number'];

    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
    
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    
    
    public function color()
    {
        return $this->belongsTo(ProductColor::class,'color_id');
    }
    
    
    public function guarantee()
    {
        return $this->belongsTo(Guarantee::class,'guarantee_id');
    }
    
    // product price + color price + guarantee price
    public function cartItemProductPrice()
    {
        $guaranteePriceIncrease = empty($this->guarantee_id) ? 0 : $this->guarantee_id;
        $colorPriceIncrease = empty($this->color_id) ? 0 : $this->color_id;
        return $this->product->price + $guaranteePriceIncrease + $colorPriceIncrease;
    }

    // discounted product price 
    public function cartItemProductDiscount()
    {   
        $cartItemProductPrice = $this->cartItemProductPrice();
        $productDiscount = empty($this->product->activeAmazingDiscount->percent) ? 0 : $this->product->activeAmazingDiscount->percent;
        return $cartItemProductPrice * $productDiscount / 100;
    }


    // number * (product price + color price + guarantee price - discount price)
    public function cartItemFinalPrice()
    {
        return $this->number * ($this->cartItemProductPrice() - $this->cartItemProductDiscount());
    }

    
    // number * product discount price
    public function cartItemFinalDiscount()
    {
        return $this->number * $this->cartItemProductDiscount();
    }


}
