<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('clsssub.index', compact('categories'));
    }

    public function create()
    {
        return view('clsssub.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create($request->all());

        return redirect()->route('clsssub.index')->with('success', 'Class Added successfully.');
    }

    public function show(Category $category)
    {
        return view('clsssub.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('clsssub.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category->update($request->all());

        return redirect()->route('clsssub.index')->with('success', 'Class updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('clsssub.index')->with('success', 'Class deleted successfully.');
    }
}
