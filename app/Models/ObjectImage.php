<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjectImage extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'object_id',
        'type',
        'url'
    ];
}
