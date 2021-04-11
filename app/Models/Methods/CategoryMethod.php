<?php

namespace App\Models\Methods;
use App\Models\Category;

trait CategoryMethod
{
	public function getSubCategoryIds($categoryId, array $categoryIds): array
    {
        $category = Category::where('id', $categoryId)->first();
        if($category){
            $subCategories = $category->childs;
            foreach ($subCategories as $subCategory){
                $categoryIds[] = $subCategory->id;
                $categoryIds =  self::getSubCategoryIds($subCategory->id,$categoryIds);
            }
        }
        return $categoryIds;
	}
}
