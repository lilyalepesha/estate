<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public $fillable = [
        'text',
        'architect_id',
        'user_id',
        'rating'
    ];
}
