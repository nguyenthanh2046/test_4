<?php

namespace App\Models\Relationships;

use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @link https://laravel.com/docs/master/eloquent-relationships
 */
trait ProductRelationship
{
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }
}
