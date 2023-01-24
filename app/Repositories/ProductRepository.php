<?php

namespace App\Repositories;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository
{
    public function __construct(
        private Product $product,
    ) {
    }

    /**
     * Get All Products
     *
     * @return LengthAwarePaginator
     */
    public function all(): LengthAwarePaginator
    {
        $products = $this->product
        ->latest()
        ->paginate(10);
        // dd($products);
        return $products;
    }
}
