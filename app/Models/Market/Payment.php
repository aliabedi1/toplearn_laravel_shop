<?php

namespace App\Models\Market;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['amount','user_id','status','type','paymentable_id', 'paymentable_type'];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    
    public function paymentable()
    {
        return $this->morphTo();
    }

}
