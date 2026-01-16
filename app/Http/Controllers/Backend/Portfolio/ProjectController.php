<?php

namespace App\Http\Controllers\Backend\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('category')->orderBy('order')->get();
        return view('backends.portfolio.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->latest()->get();
        return view('backends.portfolio.projects.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'link' => 'nullable|url',
            'order' => 'nullable|integer'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('projects', $imageName, 'public');
            $validated['image'] = $imageName;
        }

        Project::create($validated);

        $notification = [
            'message' => 'Project created successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('dashboard.portfolio.projects.index')->with($notification);
    }

    public function edit(Project $project)
    {
        $categories = Category::orderBy('name')->get();
        return view('backends.portfolio.projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'link' => 'nullable|url',
            'order' => 'nullable|integer' 
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($project->image && Storage::disk('public')->exists('projects/' . $project->image)) {
                Storage::disk('public')->delete('projects/' . $project->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('projects', $imageName, 'public');
            $validated['image'] = $imageName;
        }

        $project->update($validated);

        $notification = [
            'message' => 'Project updated successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('dashboard.portfolio.projects.index')->with($notification);
    }

    public function destroy(Project $project)
    {
        // Delete image
        if ($project->image && Storage::disk('public')->exists('projects/' . $project->image)) {
            Storage::disk('public')->delete('projects/' . $project->image);
        }

        $project->delete();

        $notification = [
            'message' => 'Project deleted successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('dashboard.portfolio.projects.index')->with($notification);
    }
}
