# Coding-challenge-backend-php

## Starting Project

1. install laravel packs

```composer
composer install
```

1. Run the following command to create .env file and generate your app key:

```
cp .env.example .env
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

- php artisan create:category --name="" --parent_category_id=""
- php artisan delete:category --id="" [--force]
- php artisan create:product --name="" --desc="" --price=""
- php artisan delete:product --id=""

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

----- 
Need helps? Reach me out

> Email: soulaimaneyh07@gmail.com

> Linkedin: soulaimane-yahya

All the best :beer:
