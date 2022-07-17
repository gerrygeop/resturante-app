<?php

namespace App\Http\Controllers;

use App\Models\Category;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $categories = Category::with('menus')->get()->first();
        return view('welcome', compact('categories'));
    }
}
