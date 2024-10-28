<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            Product::NAME_COLUMN => fake()->sentence(6),
            Product::DESCRIPTION_COLUMN => fake()->paragraph(5),
            Product::PRICE_COLUMN => fake()->randomFloat(2, 0, 100),
        ];
    }

    /**
     * Create dummy product for testing.
     *
     * @return static
     */
    public function productFactory(): static
    {
        return $this->state(fn (array $attributes) => [
            Product::NAME_COLUMN => 'product-1',
            Product::DESCRIPTION_COLUMN => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos amet eum non.',
            Product::PRICE_COLUMN => 19,
        ]);
    }
}
