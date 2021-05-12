<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    public function prices(): HasMany
    {
        return $this->hasMany(Price::class);
    }

    /**
     * The current price of the product that was last published.
     *
     * @return HasOne
     */
    public function price(): HasOne
    {
        return $this->hasOne(Price::class)->ofMany()->orderByDesc('publish_at');
    }
}
