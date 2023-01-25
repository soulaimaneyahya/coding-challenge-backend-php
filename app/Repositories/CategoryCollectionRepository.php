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
        return Category::select(['id', 'name'])->get();
    }

    /**
     * Get Parent Categories
     *
     * @return Collection
     */
    public static function parentCategories(): Collection
    {
        return Category::whereNull('parent_category_id')->get(['id', 'name']);
    }
}
