<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EstateProperty extends Model
{
    use HasFactory;

    public $fillable = [
        'estate_id',
        'property_id',
    ];

    public function estate(): BelongsTo
    {
        return $this->belongsTo(Estate::class,'estate_id','id');
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class,'property_id','id');
    }
}
