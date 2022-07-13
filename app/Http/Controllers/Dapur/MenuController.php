<?php

namespace App\Http\Controllers\Dapur;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('dapur.menus.index', compact('menus'));
    }

    public function create()
    {
        $menu = new Menu;
        $categories = Category::all();
        return view('dapur.menus.create', compact('menu', 'categories'));
    }

    public function store(MenuRequest $request)
    {
        $validate = $request->validated();
        $validate['image'] = $request->file('image')->store('images/menu');

        $menu = Menu::create($validate);

        if ($request->has('categories')) {
            $menu->categories()->attach($request->categories);
        }

        return redirect()->route('dapur.menus.index')->with('success', 'Menu added successfully');
    }

    public function show(Menu $menu)
    {
        //
    }

    public function edit(Menu $menu)
    {
        $categories = Category::all();
        return view('dapur.menus.edit', compact('menu', 'categories'));
    }

    public function update(MenuRequest $request, Menu $menu)
    {
        $validate = $request->validated();

        if ($request->hasFile('image')) {
            Storage::delete($menu->image);
            $validate['image'] = $request->file('image')->store('images/menu');
        }

        $menu->update($validate);

        if ($request->has('categories')) {
            $menu->categories()->sync($request->categories);
        }

        return redirect()->route('dapur.menus.index')->with('success', 'Menu updated successfully');
    }

    public function destroy(Menu $menu)
    {
        Storage::delete($menu->image);
        $menu->delete();
        return redirect()->back()->with('success', 'Menu deleted successfully');
    }
}
