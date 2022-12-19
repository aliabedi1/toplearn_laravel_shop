<?php

namespace App\Models\Market;

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

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class,'product_id');
    }

    public function values()
    {
        return $this->hasMany(CategoryValue::class,'product_id');
    }
    
}
