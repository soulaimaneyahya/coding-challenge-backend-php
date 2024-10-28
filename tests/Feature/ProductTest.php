<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    private $path;

    public function setUp(): void
    {
        parent::setUp();

        $this->path = public_path('img/1.jpeg');
    }

    public function testStoreValid()
    {
        $image = $this->uploadImage();

        $params = [
            Product::NAME_COLUMN => fake()->sentence($nbWords = 6),
            Product::DESCRIPTION_COLUMN => fake()->paragraph($nbSentences = 5),
            Product::PRICE_COLUMN => fake()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
            'image' => $image
        ];

        $this->post('/products', $params)
            ->assertStatus(302)
            ->assertSessionHas('alert-success');

        $this->assertEquals(session('alert-success'), 'Product Created !');
    }

    public function testStoreFail()
    {
        $params = [
            Product::NAME_COLUMN => fake()->sentence($nbWords = 6),
            Product::DESCRIPTION_COLUMN => fake()->paragraph($nbSentences = 5),
            Product::PRICE_COLUMN => fake()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        ];

        $this->post('/products', $params)
            ->assertStatus(302)
            ->assertSessionHas('errors');

        $messages = session('errors')->getMessages();

        $this->assertEquals($messages['image'][0], 'The image field is required.');
    }

    public function testUpdateValid()
    {
        $product = $this->createDummyProduct();

        $this->assertDatabaseHas(Product::TABLE, [
            'id' => $product[Product::ID_COLUMN]
        ]);
        $product->name = 'product-2';

        $this->put("/products/{$product[Product::ID_COLUMN]}", $product->toArray())
            ->assertStatus(302)
            ->assertSessionHas('alert-info');

        $this->assertEquals(session('alert-info'), 'Product Updated !');
        $this->assertDatabaseMissing(Product::TABLE, [
            Product::NAME_COLUMN => 'product-1',
        ]);
        $this->assertDatabaseHas(Product::TABLE, [
            Product::NAME_COLUMN => 'product-2',
        ]);
    }

    public function testDelete()
    {
        $product = $this->createDummyProduct();

        $this->delete("/products/{$product[Product::ID_COLUMN]}")
        ->assertStatus(302)
        ->assertSessionHas('alert-info');

        $this->assertEquals(session('alert-info'), 'Product Deleted !');

        $this->assertSoftDeleted(Product::TABLE, [
            'id' => $product[Product::ID_COLUMN]
        ]);
    }

    public function testRestore()
    {
        $product = $this->createDummyProduct();
        $this->testDelete();
        $product->restore();
        $this->assertDatabaseHas(Product::TABLE, [
            'id' => $product[Product::ID_COLUMN]
        ]);
    }

    protected function uploadImage()
    {
        return new UploadedFile($this->path, '1.jpeg', 'image/jpeg', 0, true);
    }
}
