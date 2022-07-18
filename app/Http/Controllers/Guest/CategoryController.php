<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('guest.categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        return view('guest.categories.show', compact('category'));
    }
}
