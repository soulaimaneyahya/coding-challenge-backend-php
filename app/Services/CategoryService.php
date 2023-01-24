<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    public function __construct(
        private CategoryRepository $categoryRepository,
    ) {
    }
    
    public function all()
    {
        return $this->categoryRepository->all();
    }
}
