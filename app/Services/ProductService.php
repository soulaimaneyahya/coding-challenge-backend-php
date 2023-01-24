<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public function __construct(
        private ProductRepository $productRepository,
    ) {
    }

    /**
     * Get All Products
     *
     * @return Collection
     */
    public function all()
    {
        return $this->productRepository->all();
    }
}
