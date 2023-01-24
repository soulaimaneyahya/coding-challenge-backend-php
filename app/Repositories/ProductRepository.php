<?php

namespace App\Repositories;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository
{
    public function __construct(
        private Product $product,
    ) {
    }

    /**
     * Get All Products
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->product->latest()->get();
    }
}
