<?php

namespace App\Models\Relationships;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @link https://laravel.com/docs/master/eloquent-relationships
 */
trait CategoryRelationship
{
	public function childs(): HasMany
    {
		return $this->hasMany(Category::class, 'parent_id', 'id');
	}

    public function parent(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }

	public function products(): BelongsToMany
    {
		return $this->belongsToMany(Product::class, 'product_category');
	}
}
