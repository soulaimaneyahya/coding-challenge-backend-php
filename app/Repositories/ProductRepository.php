<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Interfaces\RepositoryInterface;

class ProductRepository implements RepositoryInterface
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
        ->with('image')
        ->paginate(10)
        ->appends([
            'category' => request('category'),
            'order' => request('order'),
            'sort_by' => request('sort_by')
        ]);
        // dd($products);
        return $products;
    }
}
