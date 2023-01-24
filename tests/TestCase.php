<?php

namespace Tests;

use App\Models\Product;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Create dummy product for testing
     * @return Product
     */
    protected function createDummyProduct(): Product
    {
        return Product::factory()->productFactory()->create();
    }
}
