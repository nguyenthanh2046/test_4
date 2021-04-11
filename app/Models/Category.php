<?php

namespace App\Models;

use App\Models\Methods\CategoryMethod;
use Illuminate\Database\Eloquent\Model;
use App\Models\Relationships\CategoryRelationship;

class Category extends Model
{
    use CategoryRelationship, CategoryMethod;

    protected $fillable = [
        'name',
        'parent_id',
        'created_at',
        'updated_at',
    ];
}
