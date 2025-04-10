<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectCategories;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = ProjectCategories::withCount('projects')->get();
        return view('dashboard.categories.index', compact('categories'));
    }
    
    public function create()
    {
        return view('dashboard.categories.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'filter_class' => 'required|string|max:255',
        ]);
        
        ProjectCategories::create([
            'name' => $request->name,
            'filter_class' => $request->filter_class,
        ]);
        
        return redirect()->route('dashboard.categories.index')->with('success', 'Category created successfully');
    }
    
    public function edit($id)
    {
        $category = ProjectCategories::findOrFail($id);
        return view('dashboard.categories.edit', compact('category'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'filter_class' => 'required|string|max:255',
        ]);
        
        $category = ProjectCategories::findOrFail($id);
        $category->name = $request->name;
        $category->filter_class = $request->filter_class;
        $category->save();
        
        return redirect()->route('dashboard.categories.index')->with('success', 'Category updated successfully');
    }
    
    public function destroy($id)
    {
        $category = ProjectCategories::findOrFail($id);
        
        // Check if category has projects
        if ($category->projects()->count() > 0) {
            return redirect()->route('dashboard.categories.index')->with('error', 'Cannot delete category that has projects');
        }
        
        $category->delete();
        
        return redirect()->route('dashboard.categories.index')->with('success', 'Category deleted successfully');
    }
}