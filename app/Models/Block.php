<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Block extends Model
{
    public function district():BelongsTo
    {
        return $this->belongsTo(District::class);
    }
}
