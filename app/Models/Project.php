<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'architect_id',
        'region_id',
        'type',
        'area',
        'price_per_meter',
        'image_url'
    ];

    /**
     * @return BelongsTo
     */
    public function architect(): BelongsTo
    {
        return $this->belongsTo(Architect::class);
    }

    /**
     * @return BelongsTo
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
