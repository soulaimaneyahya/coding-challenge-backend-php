<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class ProductDeleteCommand extends Command
{
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
            Product::find($this->option('id'))->forceDelete();
        } else {
            Product::find($this->option('id'))->delete();
        }
        
        $this->info("Product deleted");
    }
}
