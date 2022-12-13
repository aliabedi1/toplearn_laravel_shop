<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
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
    




    
}
