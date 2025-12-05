<?php

namespace App\Http\Controllers\Backend\Skills;

use App\Http\Controllers\Controller;

use App\Models\Skills;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function codingSkill()
    {
        $skills = Skills::get();
        return view('backends.skills.codingSkill', compact('skills'));
    }


    // skills store
    public function store(Request $request)
    {
        $request->validate([
            'skill_name' => 'required|string|max:255',
            'percentage' => 'required|numeric|min:0|max:100',
        ]);

        Skills::create([
            'name' => $request->skill_name,
            'percentage' => $request->percentage,
        ]);

        return redirect()->back()->with('success', 'Skill added successfully!');
    }
    // skills update
    public function update(Request $request, $id)
    {
        $request->validate([
            'skill_name' => 'required|string|max:255',
            'percentage' => 'required|numeric|min:0|max:100',
        ]);

        $skill = Skills::findOrFail($id);
        $skill->update([
            'name' => $request->skill_name,
            'percentage' => $request->percentage,
        ]);

        return redirect()->back()->with('success', 'Skill updated successfully!');
    }

    public function destroy($id)
    {
        $skill = Skills::findOrFail($id);
        $skill->delete();

        return redirect()->back()->with('success', 'Skill deleted successfully!');
    }








}
