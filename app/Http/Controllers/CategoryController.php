<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryCollectionRepository;

class CategoryController extends Controller
{
    public function __construct(
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
        $parent_categories = CategoryCollectionRepository::parentCategories();
        return view('categories.create', compact('parent_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        try {
            $category = $this->categoryService->store($request->validated());
            return redirect()->route('categories.edit', compact('category'))
            ->with('alert-success', 'Category Created !');
        } catch (Exception $ex) {
            return redirect()->route('categories.index')->with('alert-danger', 'Something going wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return View
     */
    public function show(Category $category): View
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
        $parent_categories = CategoryCollectionRepository::parentCategories();
        return view('categories.edit', compact('category', 'parent_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $category = $this->categoryService->update($request->validated(), $category);
            return redirect()->route('categories.edit', compact('category'))->with('alert-info', 'Category Updated !');
        } catch (Exception $ex) {
            return redirect()->route('categories.index')->with('alert-danger', 'Something going wrong!');
        }
    }

    /**
     * category destroy
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category)
    {
        try {
            $this->categoryService->delete($category->id);
            return redirect()->route('categories.index')->with('alert-info', 'Category Deleted !');
        } catch (Exception $ex) {
            return redirect()->route('categories.index')->with('alert-danger', 'Something going wrong!');
        }
    }
}
