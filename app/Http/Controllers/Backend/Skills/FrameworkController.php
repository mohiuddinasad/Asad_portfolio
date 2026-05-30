<?php

namespace App\Http\Controllers\Backend\Skills;


use App\Http\Controllers\Controller;
use App\Models\Contact\ContactMessage;
use App\Models\Framework;
use Illuminate\Http\Request;

class FrameworkController extends Controller
{
    public function frameworkSkill()
    {
        $unreadCount = ContactMessage::where('is_read', false)->count();
        $frameworkSkills = Framework::latest()->get();
        return view('backends.skills.framework', compact('frameworkSkills', 'unreadCount'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'skill_name' => 'required|string|max:255',
            'percentage' => 'required|numeric|min:0|max:100',
        ]);

        Framework::create([
            'name' => $request->skill_name,
            'percentage' => $request->percentage,
        ]);

        return redirect()->back()->with('success', 'Framework skill added successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'skill_name' => 'required|string|max:255',
            'percentage' => 'required|numeric|min:0|max:100',
        ]);

        $frameworkSkill = Framework::findOrFail($id);
        $frameworkSkill->update([
            'name' => $request->skill_name,
            'percentage' => $request->percentage,
        ]);

        return redirect()->back()->with('success', 'Framework skill updated successfully!');
    }

    public function destroy($id)
    {
        $frameworkSkill = Framework::findOrFail($id);
        $frameworkSkill->delete();

        return redirect()->back()->with('success', 'Framework skill deleted successfully!');
    }
}