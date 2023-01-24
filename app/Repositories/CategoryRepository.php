<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements RepositoryInterface
{
    public function __construct(
        private Category $category,
    ) {
    }

    /**
     * Get All Categories
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->category
        ->latest()
        ->with('parent')
        ->get();
    }

    /**
     * Get Parent Categories
     *
     * @return Collection
     */
    public function parentCategories(): Collection
    {
        return $this->category->whereNull('parent_category_id')->get(['id', 'name']);
    }
}
