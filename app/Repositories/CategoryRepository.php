<?php

namespace App\Repositories;

use App\Models\Category;
use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryRepository implements RepositoryInterface
{
    public function __construct(
        private Category $category,
    ) {
    }

    /**
     * Get All Categories
     *
     * @return LengthAwarePaginator
     */
    public function all(): LengthAwarePaginator
    {
        $categories = $this->category
        ->latest()
        ->with('parent')
        ->paginate(10);
        // dd($categories);
        return $categories;
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
