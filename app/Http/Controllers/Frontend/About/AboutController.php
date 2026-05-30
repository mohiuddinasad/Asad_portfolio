<?php

namespace App\Http\Controllers\Frontend\About;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Framework;
use App\Models\Skills;
use App\Models\User;

class AboutController extends Controller
{
    public function index()
    {

        $user = User::find(2); // Assuming the user with ID 1 is the portfolio owner
        $skills = Skills::all(); // Database theke data ana
        $frameworkSkills = Framework::all();
        $educations = Education::all();
        $experiences = Experience::all();

        return view('frontends.about', compact('user', 'skills', 'frameworkSkills', 'educations', 'experiences'));
    }
}
