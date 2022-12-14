<?php

namespace App\Models\Market;

use App\Models\Market\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductMeta extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'product_meta';

    protected $fillable = ['meta_value', 'meta_key', 'product_id'];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
