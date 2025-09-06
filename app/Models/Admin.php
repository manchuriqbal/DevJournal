<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\AdminFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
     protected $hidden = [
        'password',
        'remember_token',
    ];

    public function profile()
    {
        return $this->morphOne(Profile::class, 'profileable');
    }

    public function posts()
    {
        return $this->morphMany(Post::class, 'postable');
    }


    public function comments()
    {
        return $this->morphMany(Comment::class, 'commenter');
    }
}
