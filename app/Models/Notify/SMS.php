<?php

namespace App\Models\Notify;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SMS extends Model
{

    use HasFactory , SoftDeletes ;

    protected $table = 'public_sms';


    protected $fillable = [
       'title', 
       'body', 
       'status', 
       'published_at', 
    ];




}
