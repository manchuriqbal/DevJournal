<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    /** @use HasFactory<\Database\Factories\ProfileFactory> */
    use HasFactory;

    protected $fillable = [
        'profileable_id',
        'profileable_type',
        'avatar',
        'job_title',
        'phone',
        'address',
        'gender',
        'bio',
        'dob',
        'social_links',
    ];

    public function profileable()
    {
        return $this->morphTo();
    }

    protected $casts = [
        'social_links' => 'array',
    ];
}
