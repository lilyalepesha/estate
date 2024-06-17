<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Favourite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'estate_id',
        'user_type',
        'favourite_type'
    ];

    public function favouriteable(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'favourite_type', 'favourite_id');
    }
}
