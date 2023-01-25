<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Console\Command;

class ProductCreateCommand extends Command
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
    protected $signature = 'create:product {--name=} {--desc=} {--price=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new Product';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $product = $this->productService->store([
            'name' => $this->option('name'),
            'description' => $this->option('desc'),
            'price' => $this->option('price'),
        ]);

        $this->info("Product Success Created - id: #{$product->id}");
    }
}
