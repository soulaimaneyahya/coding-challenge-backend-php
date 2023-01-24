<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use App\Models\Category;
use Exception;

class CategoryController extends Controller
{
    public function __construct (
        private CategoryService $categoryService
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $categories = $this->categoryService->all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $parent_categories = $this->categoryService->parentCategories();
        return view('categories.create', compact('parent_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {
            $category = $this->categoryService->store($request->validated());
            return redirect()->route('categories.edit', compact('category'))->with('alert-success', 'Category Created !');
        } catch (Exception $ex) {
            // dd($ex->getMessage());
            return redirect()->route('categories.index')->with('alert-danger', 'Something going wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return View
     */
    public function edit(Category $category): View
    {
        $parent_categories = $this->categoryService->parentCategories();
        return view('categories.edit', compact('category', 'parent_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $category = $this->categoryService->update($request->validated(), $category);
            return redirect()->route('categories.edit', compact('category'))->with('alert-info', 'Category Updated !');
        } catch (Exception $ex) {
            // dd($ex->getMessage());
            return redirect()->route('categories.index')->with('alert-danger', 'Something going wrong!');
        }
    }

    /**
     * category destroy
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        try {
            $this->categoryService->delete($category);
            return redirect()->route('categories.index')->with('alert-info', 'Category Deleted !');
        } catch (Exception $ex) {
            // dd($ex->getMessage());
            return redirect()->route('categories.index')->with('alert-danger', 'Something going wrong!');
        }
    }
}
