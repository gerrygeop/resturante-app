<?php

namespace App\Http\Controllers\Dapur;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableRequest;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        $tables = Table::all();
        return view('dapur.tables.index', compact('tables'));
    }

    public function create()
    {
        $table = new Table;
        return view('dapur.tables.create', compact('table'));
    }

    public function store(TableRequest $request)
    {
        Table::create($request->validated());

        return to_route('dapur.tables.index')->with('success', 'Table Added Succesfully');
    }

    public function show(Table $table)
    {
        //
    }

    public function edit(Table $table)
    {
        return view('dapur.tables.edit', compact('table'));
    }

    public function update(TableRequest $request, Table $table)
    {
        $table->update($request->validated());

        return to_route('dapur.tables.index')->with('success', 'Table updated successfully');
    }

    public function destroy(Table $table)
    {
        $table->reservations()->delete();
        $table->delete();
        return back()->with('success', 'Table deleted successfully');
    }
}
