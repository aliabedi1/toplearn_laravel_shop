<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Otp extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['token','user_id','otp_code','login_id','type','used','status'];




    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
