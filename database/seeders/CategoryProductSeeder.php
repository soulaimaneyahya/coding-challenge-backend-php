<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();
        foreach ($products as $product) {
            $categories = Category::all()->random(rand(1, 3))->pluck('id');
            $product->categories()->sync($categories);
        }
    }
}
