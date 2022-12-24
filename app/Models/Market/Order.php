<?php

namespace App\Models\Market;

use App\Models\User;
use App\Models\Address;
use App\Models\Market\Payment;
use App\Models\Market\Delivery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory,SoftDeletes;


    protected $table = 'orders';

    
    protected $fillable = ['user_id','address_id','address_object','payment_id','payment_object','payment_type','payment_status','delivery_id','delivery_object	','delivery_amount','delivery_status','delivery_date','order_final_amount','order_discount_amount','copan_id','copan_object','order_copan_discount_amount','common_discount_id','common_discount_object','common_discount_amount','order_total_products_discount_amount','status'];

    public function payment()
    {
        return $this->belongsTo(Payment::class , 'payment_id');
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class , 'delivery_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class , 'address_id');
    }
        
    public function copan()
    {
        return $this->belongsTo(Copan::class , 'copan_id');
    }
        
    public function commonDiscount()
    {
        return $this->belongsTo(CommonDiscount::class , 'common_discount_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class , 'order_id');
    }

    public function getPaymentStatusValueAttribute()
    {
        switch($this->payment_status)
        {
            case 0:
                $result = 'پرداخت نشده';
                break;
            case 1:
                $result = 'پرداخت شده';
                break;
            case 2:
                $result = 'لغو شده';
                break;
            case 3:
                $result = 'برگشت داده شده';
                break;
            
        }

        return $result;
    }

    public function getPaymentTypeValueAttribute()
    {
        switch($this->payment_type)
        {
            case 0:
                $result = 'آنلاین';
                break;
            case 1:
                $result = 'آفلاین';
                break;
            case 2:
                $result = 'پرداخت در محل';
                break;
        }

        return $result;
    }

    public function getDeliveryStatusValueAttribute()
    {
        switch($this->delivery_status)
        {
            case 0:
                $result = 'ارسال نشده';
                break;
            case 1:
                $result = 'درحال ارسال';
                break;
            case 2:
                $result = 'ارسال شده';
                break;
            case 3:
                $result = 'تحویل داده شده';
                break;
        }

        return $result;
    }

    public function getStatusValueAttribute()
    {
        switch($this->status)
        {
            case 0:
                $result = 'بررسی نشده';
                break;
            case 1:
                $result = 'تایید نشده';
                break;
            case 2:
                $result = 'در انتظار تایید';
                break;
            case 3:
                $result = 'تایید شده';
                break;
            case 4:
                $result = 'باطل شده';
                break;
            case 5:
                $result = 'مرجوع شده';
                break;
        }

        return $result;
    }

}
