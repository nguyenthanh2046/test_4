<?php

namespace App\Models;

use App\Models\Attributes\ProductAttribute;
use Illuminate\Database\Eloquent\Model;
use App\Models\Relationships\ProductRelationship;
use App\Models\Methods\ProductMethod;

class Product extends Model
{
    use ProductRelationship, ProductMethod, ProductAttribute;

    protected $fillable = [
        'name',
        'file_name',
        'original_name',
        'sku',
        'description',
        'price',
        'created_at',
        'updated_at',
    ];
}
