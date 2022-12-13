<?php

namespace App\Models\Content;

use App\Models\Content\PostCategory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Post extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    public function Sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    protected $casts = ['image' => 'array'];

    protected $fillable = ['title', 'summary', 'body', 'image', 'status', 'tags', 'published_at' , 'author_id' , 'category_id' ,'commentable'];



    public function postCategory()
    {
        return $this->BelongsTo(PostCategory::class , "category_id");
    }



    public function comments()
    {
        return $this->MorphMany('App\Models\Content\Comment', 'commentable');
    }





}
