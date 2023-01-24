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
            'name' => fake()->sentence($nbWords = 6),
            'description' => fake()->paragraph($nbSentences = 5),
            'price' => fake()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        ];
    }

    /**
     * Create dummy product for testing
     * @return static
     */
    public function productFactory(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'product-1',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos amet eum non.',
            'price' => 19,
        ]);
    }
}
