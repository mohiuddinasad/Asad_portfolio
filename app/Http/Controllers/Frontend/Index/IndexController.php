<?php

namespace App\Http\Controllers\Frontend\Index;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Framework;
use App\Models\Skills;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {

        $skills = Skills::all(); // Database theke data ana
        $frameworkSkills = Framework::all();
        $educations = Education::all();
        $experiences = Experience::all();
        return view('index', compact('skills', 'frameworkSkills', 'educations', 'experiences'));
    }
}
