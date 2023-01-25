<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;

class CategoryDeleteCommand extends Command
{
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
            Category::find($this->option('id'))->forceDelete();
        } else {
            Category::find($this->option('id'))->delete();
        }
        
        $this->info("Category deleted");
    }
}
