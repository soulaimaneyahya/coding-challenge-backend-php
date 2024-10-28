<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use App\Interfaces\CategoryCollectionInterface;

class CategoryCollectionRepository implements CategoryCollectionInterface
{
    /**
     * get all Categories
     * @return Collection
     */
    public static function allCategories(): Collection
    {
        return Category::select([Category::ID_COLUMN, Category::NAME_COLUMN])->get();
    }

    /**
     * Get Parent Categories
     *
     * @return Collection
     */
    public static function parentCategories(): Collection
    {
        return Category::whereNull(Category::PARENT_CATEGORY_ID_COLUMN)
            ->get([Category::ID_COLUMN, Category::NAME_COLUMN]);
    }
}
