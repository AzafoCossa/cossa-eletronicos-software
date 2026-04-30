<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class ProductVariant extends Model
{
    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function images():MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
