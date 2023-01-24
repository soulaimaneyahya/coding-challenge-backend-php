<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

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
            'name' => fake()->sentence($nbWords = 6),
            'description' => fake()->paragraph($nbSentences = 5),
            'price' => fake()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
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
            'name' => fake()->sentence($nbWords = 6),
            'description' => fake()->paragraph($nbSentences = 5),
            'price' => fake()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        ];

        $this->post('/products', $params)
            ->assertStatus(302)
            ->assertSessionHas('errors');

        $messages = session('errors')->getMessages();

        $this->assertEquals($messages['image'][0], 'The image field is required.');
    }

    public function testDelete()
    {
        $product = $this->createDummyProduct();

        $this->delete("/products/{$product->id}")
        ->assertStatus(302)
        ->assertSessionHas('alert-info');

        $this->assertEquals(session('alert-info'), 'Product Deleted !');

        $this->assertSoftDeleted('products', [
            'id' => $product->id
        ]);
    }

    protected function uploadImage()
    {
        return new UploadedFile($this->path, '1.jpeg', 'image/jpeg', 0, true);
    }
}
