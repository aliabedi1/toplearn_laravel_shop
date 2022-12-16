<?php

namespace App\Models\Market;

use App\Models\Market\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryAttribute extends Model
{
    use HasFactory,SoftDeletes;

    
    protected $table = 'category_attributes';

    protected $fillable = ['name','type','category_id','unit'];


    public function category()
    {
        return $this->belongsTo(ProductCategory::class,'category_id');
    }

    
    public function values()
    {
        return $this->hasMany(CategoryValue::class,'category_attribute_id');
    }
    
}
