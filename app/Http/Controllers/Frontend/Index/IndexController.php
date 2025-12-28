<?php

namespace App\Http\Controllers\Frontend\Index;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Faq;
use App\Models\Framework;
use App\Models\Pricing;
use App\Models\Project;
use App\Models\Service\Service;
use App\Models\Skills;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find(2); // Assuming the user with ID 1 is the portfolio owner
        $skills = Skills::all(); // Database theke data ana
        $frameworkSkills = Framework::all();
        $educations = Education::all();
        $experiences = Experience::all();
        $pricings = Pricing::get();
        $faqs = Faq::all();
        $services = Service::all();
        $categories = Category::withCount('projects')
            ->orderBy('order')
            ->get();

        $selectedCategory = $request->get('category');

        $projectsQuery = Project::with('category')->orderBy('order');

        if ($selectedCategory) {
            $projectsQuery->whereHas('category', function ($query) use ($selectedCategory) {
                $query->where('slug', $selectedCategory);
            });
        }

        // Get total count for "View All" button logic
        $totalProjects = $projectsQuery->count();

        // Get first 6 projects for index page
        $projects = $projectsQuery->limit(6)->get();

        $showViewAll = $totalProjects > 6;

        return view('index', compact('skills', 'frameworkSkills', 'educations', 'experiences', 'categories', 'projects', 'showViewAll', 'user', 'pricings', 'faqs', 'services'));
    }

    public function all(Request $request)
    {
        $categories = Category::withCount('projects')
            ->orderBy('order')
            ->get();

        $selectedCategory = $request->get('category');

        $projectsQuery = Project::with('category')->orderBy('order');

        if ($selectedCategory) {
            $projectsQuery->whereHas('category', function ($query) use ($selectedCategory) {
                $query->where('slug', $selectedCategory);
            });
        }

        $projects = $projectsQuery->paginate(12);

        return view('frontends.project', compact('categories', 'projects', 'selectedCategory'));
    }

    public function serviceDetails($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $services = Service::all(); // Get all services including current one
        return view('frontends.service_details', compact('service', 'services'));
    }

}