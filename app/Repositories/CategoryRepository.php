<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
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
        return $this->category->latest()->get();
    }
}
