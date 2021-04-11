<?php

namespace App\Models\Attributes;

/**
 * @link https://laravel.com/docs/master/eloquent-mutators
 */
trait ProductAttribute
{
	public function setPriceAttribute($value)
	{
		$this->attributes['price'] = str_replace(',', '', $value);
	}
}
