<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;
use App\Services\CategoryService;

class CategoryDeleteCommand extends Command
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
    protected $signature = 'delete:category {--id=} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Category delete';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->option('force')) {
            $this->categoryService->forceDelete($this->option('id'));
        } else {
            $this->categoryService->delete($this->option('id'));
        }
        
        $this->info("Category deleted");
    }
}
