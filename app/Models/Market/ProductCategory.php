<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use App\Models\Market\CategoryAttribute;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
    use HasFactory , Sluggable , SoftDeletes;

    protected $table = 'product_categories';

    protected $casts = ['image' => 'array'];

    protected $fillable = ['name', 'description', 'slug', 'image', 'status', 'tags' , 'show_in_menu' , 'parent_id ' ]; 


    public function Sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }



    
    public function parent()
    {
        return $this->belongsTo($this , 'parent_id')->with('parent');
    }

    public function children()
    {
        return $this->hasMany($this , 'parent_id')->with('children');
    }


    public function attributes()
    {
        return $this->hasMany(CategoryAttribute::class, 'category_id');
    }
    
    

    public function products()
    {
        return $this->hasMany(Product::class , 'category_id');
    }

    
}
