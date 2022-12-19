<?php

namespace App\Models\Market;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory, SoftDeletes;


    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->BelongsTo(User::class, 'author_id');
    }



    
    
    public function parent()
    {
        return $this->belongsTo($this , 'parent_id');
    }

    public function children()
    {
        return $this->hasMany($this , 'parent_id');
    }
    
    
    protected $fillable = ['body', 'parent_id', 'author_id', 'commentable_id', 'commentable_type', 'status', 'approved' , 'seen'];


}
