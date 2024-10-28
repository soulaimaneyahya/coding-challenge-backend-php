<?php

namespace App\Repositories;

use Exception;
use App\Models\Product;
use App\Models\Category;
use App\Interfaces\RepositoryInterface;
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
        ->withCount(Product::TABLE)
        ->paginate(10);

        return $categories;
    }

    /**
     * findOne Category
     * @param string $id
     * @return Category
     */
    public function findOne(string $id): Category
    {
        try {
            return $this->category->findOrFail($id);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
