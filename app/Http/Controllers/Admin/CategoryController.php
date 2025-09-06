<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.category.index')->with([
            'categories'=> $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.category.create')->with([
            'categories'=> $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data= $request->validated();
        $data['slug'] = Str::slug($data['name'], '-');
        Category::create( $data);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $category = Category::findOrFail($id);
        // dd($category->toJson());

        if (!$category) {
            return redirect()->route('admin.categories.index')->with('error', 'Category not found.');
        }else{

            return view('admin.category.edit')->with([
                'category' => $category,
                'categories' => $categories
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category = Category::findOrFail($id);
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name'], '-');
        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        if ($category->children()->count() > 0) {
            return redirect()->back()->with('error', 'Category cannot be deleted because it has subcategories.');
            // dd('Category cannot be deleted because it has subcategories.');
        }else {
             $category->delete();
        }
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
