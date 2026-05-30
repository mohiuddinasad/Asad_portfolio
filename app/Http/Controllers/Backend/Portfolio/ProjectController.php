<?php

namespace App\Http\Controllers\Backend\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact\ContactMessage;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $unreadCount = ContactMessage::where('is_read', false)->count();
        $projects = Project::with('category')->orderBy('order')->get();
        return view('backends.portfolio.projects.index', compact('projects', 'unreadCount'));
    }

    public function create()
    {
        $unreadCount = ContactMessage::where('is_read', false)->count();
        $categories = Category::orderBy('name')->latest()->get();
        return view('backends.portfolio.projects.create', compact('categories', 'unreadCount'));
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

        // Upload image (PUBLIC 🔥)
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/projects'), $imageName);
            $validated['image'] = 'uploads/projects/' . $imageName;
        }

        Project::create($validated);

        return redirect()->route('dashboard.portfolio.projects.index')
            ->with('success', 'Project created successfully');
    }

    public function edit(Project $project)
    {
        $unreadCount = ContactMessage::where('is_read', false)->count();
        $categories = Category::orderBy('name')->get();
        return view('backends.portfolio.projects.edit', compact('project', 'categories', 'unreadCount'));
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

        // Update image
        if ($request->hasFile('image')) {

            // Delete old image
            if ($project->image && file_exists(public_path($project->image))) {
                unlink(public_path($project->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/projects'), $imageName);
            $validated['image'] = 'uploads/projects/' . $imageName;
        }

        $project->update($validated);

        return redirect()->route('dashboard.portfolio.projects.index')
            ->with('success', 'Project updated successfully');
    }

    public function destroy(Project $project)
    {
        // Delete image
        if ($project->image && file_exists(public_path($project->image))) {
            unlink(public_path($project->image));
        }

        $project->delete();

        return redirect()->route('dashboard.portfolio.projects.index')
            ->with('success', 'Project deleted successfully');
    }
}