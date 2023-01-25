<?php

namespace App\Services;

use Exception;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Pagination\LengthAwarePaginator;

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
     * @return LengthAwarePaginator
     */
    public function all()
    {
        return $this->categoryRepository->all();
    }

    /**
     * findOne Category
     * @param string $id
     * @return Category
     */
    public function findOne(string $id): Category
    {
        try {
            return $this->categoryRepository->findOne($id);
        } catch (Exception $ex) {
            throw $ex;
        }
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
     * delete category
     * @param string $id
     * @return void
     */
    public function delete(string $id)
    {
        try {
            $category = $this->findOne($id);
            $category->subcategories()->delete();
            $category->delete();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    /**
     * delete forceDelete category
     * @param string $id
     * @return void
     */
    public function forceDelete(string $id)
    {
        try {
            $category = $this->findOne($id);
            $category->products()->sync([]);
            $category->subcategories()->forceDelete();
            $category->forceDelete();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
