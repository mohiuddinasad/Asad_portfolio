<?php

namespace App\Http\Controllers\Backend\Resume;

use App\Http\Controllers\Controller;
use App\Models\Contact\ContactMessage;
use App\Models\Education;  // এই line টি add করুন
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    public function Education()
    {
        $unreadCount = ContactMessage::where('is_read', false)->count();
        $educations = Education::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('backends.resume.education', compact('educations', 'unreadCount'));
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'duration' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    Education::create([
        'user_id' => Auth::id(),
        'title' => $request->title,
        'duration' => $request->duration,
        'description' => $request->description,
    ]);

    return redirect()->back()->with('success', 'Education added successfully!');
}


    // Update education
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $education = Education::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $education->update([
            'title' => $request->title,
            'duration' => $request->duration,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Education updated successfully!');
    }

    // Delete education
    public function destroy($id)
    {
        $education = Education::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $education->delete();

        return redirect()->back()->with('success', 'Education deleted successfully!');
    }
}
