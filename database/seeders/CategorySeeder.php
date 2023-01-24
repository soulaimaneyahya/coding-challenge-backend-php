<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = max((int)$this->command->ask("How many categories would you like ?", 20), 1);
        $categories = Category::factory($count)->create();

        $categories->each(function (Category $category) {
            $category->parent_category_id = fake()->randomElement([Category::get()->random()->id, null]);
            $category->save();
        });
    }
}
