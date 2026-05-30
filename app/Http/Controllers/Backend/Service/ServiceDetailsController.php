<?php

namespace App\Http\Controllers\Backend\Service;

use App\Http\Controllers\Controller;
use App\Models\Contact\ContactMessage;
use App\Models\Service\Service;
use Illuminate\Http\Request;

class ServiceDetailsController extends Controller
{
    public function index()
    {
        $unreadCount = ContactMessage::where('is_read', false)->count();
        $services = Service::get();
        return view('backends.service.index', compact('services', 'unreadCount'));
    }

    public function serviceCreate()
    {
        $unreadCount = ContactMessage::where('is_read', false)->count();
        return view('backends.service.create', compact('unreadCount'));
    }

    public function serviceStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:services,slug',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'features' => 'nullable|array',
            'features.*' => 'string|max:500',
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
        ]);

        $imagePath = null;

        // Upload image (PUBLIC तरीका 🔥)
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/services'), $imageName);
            $imagePath = 'uploads/services/' . $imageName;
        }

        $service = new Service();
        $service->title = $request->title;
        $service->slug = $request->slug;
        $service->image = $imagePath;
        $service->features = json_encode($request->features);
        $service->short_description = $request->short_description;
        $service->description = $request->description;
        $service->save();

        return redirect()->route('dashboard.service.index')->with('success', 'Service created successfully.');
    }

    // DELETE
    public function serviceDelete($id)
    {
        $service = Service::findOrFail($id);

        // Delete image file
        if ($service->image && file_exists(public_path($service->image))) {
            unlink(public_path($service->image));
        }

        $service->delete();

        return redirect()->route('dashboard.service.index')->with('success', 'Service deleted successfully.');
    }

    // EDIT
    public function serviceEdit($id)
    {
        $unreadCount = ContactMessage::where('is_read', false)->count();
        $service = Service::findOrFail($id);
        return view('backends.service.edit', compact('service', 'unreadCount'));
    }

    // UPDATE
    public function serviceUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:services,slug,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'features' => 'nullable|array',
            'features.*' => 'string|max:500',
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
        ]);

        $service = Service::findOrFail($id);

        // Image update
        if ($request->hasFile('image')) {

            // Delete old image
            if ($service->image && file_exists(public_path($service->image))) {
                unlink(public_path($service->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/services'), $imageName);
            $service->image = 'uploads/services/' . $imageName;
        }

        $service->title = $request->title;
        $service->slug = $request->slug;
        $service->features = json_encode($request->features);
        $service->short_description = $request->short_description;
        $service->description = $request->description;
        $service->save();

        return redirect()->route('dashboard.service.index')->with('success', 'Service updated successfully.');
    }
}