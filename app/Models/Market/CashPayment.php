<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CashPayment extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['amount','user_id','status','cash_receiver','pay_date'];


    
    public function payments()
    {
        return $this->MorphMany('App\Models\Market\Payment', 'paymentable');
    }
}
