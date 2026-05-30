<?php

namespace App\Http\Controllers\Backend\Resume;

use App\Http\Controllers\Controller;
use App\Models\Contact\ContactMessage;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    // Display all experience records
    public function Experience()
    {
        $unreadCount = ContactMessage::where('is_read', false)->count();
        $experiences = Experience::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backends.resume.experience', compact('experiences', 'unreadCount'));
    }

    // Store new experience
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Experience::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'duration' => $request->duration,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Experience added successfully!');
    }

    // Update experience
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $experience = Experience::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $experience->update([
            'title' => $request->title,
            'duration' => $request->duration,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Experience updated successfully!');
    }

    // Delete experience
    public function destroy($id)
    {
        $experience = Experience::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $experience->delete();

        return redirect()->back()->with('success', 'Experience deleted successfully!');
    }
}