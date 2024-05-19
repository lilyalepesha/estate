<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estate extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'description',
        'price',
        'total_area',
        'living_space',
        'type',
        'image_url',
        'region_id',
        'user_id'
    ];

    /**
     * @return BelongsTo
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }
}
