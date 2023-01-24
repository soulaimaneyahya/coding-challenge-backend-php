# Coding-challenge-backend-php

## Starting Project

1. install laravel packs

```composer
composer install
```

1. Run the following command to create .env file and generate your app key:

```
mv .env.example .env
```


```bash
php artisan key:generate
```

2. Create the symbolic link:
```bash
php artisan storage:link
```

3. install npm and run

```npm
npm install
```

```npm
npm run dev
```

## Generate Data

```
php artisan db:seed
```

## CLI
create & delete product using php artisan tinker:
- Product::create(['name' => 'lorem ipsum', 'description' => 'lorem ipsum dolor sit ament', 'price' => 19]);
- Product::first()->delete(); # or use ->forceDelete();

- Category::create(['name' => 'lorem ipsum', 'parent_category_id' => Category::first()->id]);
- Category::first()->delete(); # or use ->forceDelete();

Attach product to category

- $product = Product::first();
- $category = Category::first();
- $product->categories()->attach($category1);
- $product->categories()->detach($category1);

## Validate PHP-PSR
- ./vendor/bin/phpcs app/Http/Controllers/ProductController.php --standard=PSR2
- ./vendor/bin/phpcs app/Http/Controllers/CategoryController.php --standard=PSR2
- ./vendor/bin/phpcs app/Services/CategoryService.php --standard=PSR2
- ./vendor/bin/phpcs app/Services/ProductService.php --standard=PSR2
- ./vendor/bin/phpcs app/Repositories/ProductRepository.php --standard=PSR2
- ./vendor/bin/phpcs app/Repositories/ProductRepository.php --standard=PSR2
- ./vendor/bin/phpcs app/Interfaces/ParentCategoriesInterface.php --standard=PSR2
- ./vendor/bin/phpcs app/Interfaces/RepositoryInterface.php --standard=PSR2
- ./vendor/bin/phpcs tests/Feature/ProductTest.php --standard=PSR2

----- 
Need helps? Reach me out

> Email: soulaimaneyh07@gmail.com

> Linkedin: soulaimane-yahya

All the best :beer:
