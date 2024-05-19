<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'architect_id',
        'region_id',
        'type',
        'area',
        'price_per_meter',
        'image_url',
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

    /**
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class, 'project_id');
    }

    /**
     * @return HasOne
     */
    public function image(): HasOne
    {
        return $this->hasOne(ProjectImage::class, 'project_id')->latestOfMany();
    }
}
