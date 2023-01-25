<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Console\Command;

class ProductDeleteCommand extends Command
{
    public function __construct(
        private ProductService $productService
    ) {
        parent::__construct();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:product {--id=} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Product delete';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->option('force')) {
            $this->productService->forceDelete($this->option('id'));
        } else {
            $this->productService->delete($this->option('id'));
        }
        
        $this->info("Product deleted");
    }
}
