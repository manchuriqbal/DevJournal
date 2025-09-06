<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Creator extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\CreatorFactory> */
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
