<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfflinePayment extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['amount','user_id','transaction_id','pay_date','status',];


    
    public function payments()
    {
        return $this->MorphMany('App\Models\Market\Payment', 'paymentable');
    }
}
