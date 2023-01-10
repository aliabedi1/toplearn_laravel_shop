<?php

namespace App\Models\Market;

use App\Models\User;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes , Sluggable;



    public function Sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $casts = ['image' => 'array'];

    protected $fillable = ['name', 'introduction', 'slug', 'image', 'status', 'tags' ,'weight','weight_unit' ,'length','width','height','price','marketable','sold_number','frozen_number','marketable_number','brand_id','category_id','published_at'];


    public function metas()
    {
        return $this->hasMany(ProductMeta::class);
    }


    public function category()
    {
        return $this->belongsTo(ProductCategory::class , 'category_id');
    }


    public function comments()
    {
        return $this->MorphMany('App\Models\Market\Comment', 'commentable');
    }

    public function colors()
    {
        return $this->hasMany(ProductColor::class,'product_id');
    }

    public function images()
    {
        return $this->hasMany(ProductGallery::class,'product_id');
    }

    public function values()
    {
        return $this->hasMany(CategoryValue::class,'product_id');
    }

    
    public function amazingDiscounts()
    {
        return $this->hasMany(AmazingDiscount::class,'product_id');
    }

    
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class , 'product_id');
    }

    
    public function guarantees()
    {
        return $this->hasMany(Guarantee::class , 'product_id');
    }
    

    public function getActiveAmazingDiscountAttribute()
    {
        return $this->amazingDiscounts()->where('start_date', '<=', Carbon::now())->where('status', 1)->where('end_date', '>=', Carbon::now())->orderBy('id', 'desc')->first();
    }


    
    public function getActiveCommentsAttribute()
    {
        return $this->comments()->where('status', 1)->where('approved', 1)->whereNull('parent_id')->orderBy('created_at', 'desc')->get();
    }


    public function users()
    {
        
        return $this->belongsToMany(User::class);
    }


}
