<?php

namespace App\Http\Controllers\Dapur;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('dapur.categories.index', compact('categories'));
    }

    public function create()
    {
        $category = new Category;
        return view('dapur.categories.create', compact('category'));
    }

    public function store(CategoryRequest $request)
    {
        $validate = $request->validated();
        $validate['image'] = $request->file('image')->store('images/category');

        Category::create($validate);
        return redirect()->route('dapur.categories.index')->with('success', 'Category added successfully');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('dapur.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $validate = $request->validated();

        if ($request->hasFile('image')) {
            Storage::delete($category->image);
            $validate['image'] = $request->file('image')->store('images/category');
        }

        $category->update($validate);
        return redirect()->route('dapur.categories.index')->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        Storage::delete($category->image);
        $category->menus()->detach();
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }
}
