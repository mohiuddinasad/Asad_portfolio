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

        $imagePath = null; // define default

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('services', $imageName, 'public');
            $imagePath = 'services/' . $imageName;
        }

        // Create service record
        $service = new Service();
        $service->title = $request->title;
        $service->slug = $request->slug;
        $service->image = $imagePath; // will be null if no image uploaded
        $service->features = json_encode($request->features);
        $service->short_description = $request->short_description;
        $service->description = $request->description;
        $service->save();

        return redirect()->route('dashboard.service.index')->with('success', 'Service created successfully.');
    }

    // services delete
    public function serviceDelete($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('dashboard.service.index')->with('success', 'Service deleted successfully.');
    }

    // service edit
    public function serviceEdit($id)
    {
        $unreadCount = ContactMessage::where('is_read', false)->count();
        $service = Service::findOrFail($id);
        return view('backends.service.edit', compact('service', 'unreadCount'));
    }

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

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('services', $imageName, 'public');
            $service->image = 'services/' . $imageName;
        }

        // Update service record
        $service->title = $request->title;
        $service->slug = $request->slug;
        $service->features = json_encode($request->features);
        $service->short_description = $request->short_description;
        $service->description = $request->description;
        $service->save();

        return redirect()->route('dashboard.service.index')->with('success', 'Service updated successfully.');
    }




}
