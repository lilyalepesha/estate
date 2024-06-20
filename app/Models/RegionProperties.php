<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionProperties extends Model
{
    use HasFactory;

    protected $fillable = [
        'street',
        'image_url'.
        'area',
        'region_id'
    ];
}
