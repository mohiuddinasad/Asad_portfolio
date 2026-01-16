<?php


namespace App\Http\Controllers\Backend\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('projects')->orderBy('order')->get();
        return view('backends.portfolio.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backends.portfolio.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'order' => 'nullable|integer'
        ]);

        Category::create($validated);

        $notification = [
            'message' => 'Category created successfully',
            'alert-type' => 'success' 
        ];

        return redirect()->route('dashboard.portfolio.categories.index')->with($notification);
    }

    public function edit(Category $category)
    {
        return view('backends.portfolio.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'order' => 'nullable|integer'
        ]);

        $category->update($validated);

        $notification = [
            'message' => 'Category updated successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('dashboard.portfolio.categories.index')->with($notification);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        $notification = [
            'message' => 'Category deleted successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('dashboard.portfolio.categories.index')->with($notification);
    }
}