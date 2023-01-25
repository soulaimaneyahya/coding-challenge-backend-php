<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Console\Command;

class CategoryCreateCommand extends Command
{
    public function __construct(
        private CategoryService $categoryService
    ) {
        parent::__construct();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:category {--name=} {--parent_category_id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new Category';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $category = $this->categoryService->store([
            'name' => $this->option('name'),
            'parent_category_id' => $this->option('parent_category_id'),
        ]);

        $this->info("Category Success Created - id: #{$category->id}");
    }
}
