<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;
use App\Services\CategoryService;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function __construct(
        private ProductService $productService,
        private CategoryService $categoryService,
    ) {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $products = $this->productService->all();
        $categories = $this->categoryService->allCategories();
        // dd($products);
        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $categories = $this->categoryService->allCategories();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            $product = $this->productService->store($request->validated());
            return redirect()->route('products.edit', compact('product'))->with('alert-success', 'Product Created !');
        } catch (Exception $ex) {
            // dd($ex->getMessage());
            return redirect()->route('products.index')->with('alert-danger', 'Something going wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return View
     */
    public function edit(Product $product): View
    {
        $categories = $this->categories;
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        try {
            $product = $this->productService->update($request->validated(), $product);
            return redirect()->route('products.edit', compact('product'))->with('alert-info', 'Product Updated !');
        } catch (Exception $ex) {
            // dd($ex->getMessage());
            return redirect()->route('products.index')->with('alert-danger', 'Something going wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $this->productService->delete($product);
            return redirect()->route('products.index')->with('alert-info', 'Product Deleted !');
        } catch (Exception $ex) {
            // dd($ex->getMessage());
            return redirect()->route('products.index')->with('alert-danger', 'Something going wrong!');
        }
    }
}
