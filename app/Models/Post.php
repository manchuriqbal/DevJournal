<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'content',
        'image',
        'status',
        'postable_id',
        'postable_type',
    ] ;


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function postable()
    {
        return $this->morphTo();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
