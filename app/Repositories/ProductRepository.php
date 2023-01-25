<?php

namespace App\Repositories;

use Exception;
use App\Models\Product;
use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

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

        return $products;
    }

    /**
     * findOne Product
     * @param string $id
     * @return Product
     */
    public function findOne(string $id): Product
    {
        try {
            return $this->product->findOrFail($id);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
