<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function __construct(
        private CategoryRepository $categoryRepository,
        private Category $category,
    ) {
    }
    
    /**
     * Get All Categories
     *
     * @return Collection
     */
    public function all()
    {
        return $this->categoryRepository->all();
    }

    /**
     * Get Parent Categories
     *
     * @return Collection
     */
    public function parentCategories()
    {
        return $this->categoryRepository->parentCategories();
    }

    /**
     * Store Category
     * @param array $data
     * @return Category
     */
    public function store(array $data): Category
    {
        $category = $this->category->create($data);

        if (isset($data['parent_category_id'])) {
            $category->parent()->associate($data['parent_category_id'])->save();
        }

        return $category;
    }

    /**
     * Update Category
     * @param array $data
     * @param Category $category
     * @return Category
     */
    public function update(array $data, Category $category): Category
    {
        if (isset($data['parent_category_id']) && !is_null($category->parent_category_id)) {
            $category->parent_category_id = $data['parent_category_id'];
            $category->save();
        } else {
            $category->parent_category_id = null;
            $category->save();
        }

        $category->update($data);

        return $category;
    }

    /**
     * category delete
     * @param Category $category
     * @return void
     */
    public function delete(Category $category)
    {
        $category->delete();
    }
}
