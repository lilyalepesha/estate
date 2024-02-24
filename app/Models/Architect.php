<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Architect extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'last_name',
        'name',
        'father_name',
        'email',
        'experience',
        'verified',
        'password',
        'avatar_url',
        'description'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'password' => 'hashed',
    ];
}
