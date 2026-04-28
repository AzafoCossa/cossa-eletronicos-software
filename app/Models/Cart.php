<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    protected $guarded = [

    ];

    public function getSubtotalAttribute()
    {
        return $this->items->sum(function($item){
            return ($item->quantity * $item->price);
        });
    }

    public function items():HasMany
    {
        return $this->hasMany(CartItem::class);
    }
}
