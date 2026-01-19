<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact\ContactMessage;
use App\Models\Project;
use App\Models\Service\Service;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Total counts
        $totalVisitors = Visitor::count();
        $totalProjects = Project::count();
        $totalServices = Service::count();
        $unreadCount = ContactMessage::where('is_read', false)->count();

        // Today's visitors
        $todayVisitors = Visitor::whereDate('visited_at', today())->count();

        // Visitor analytics - last 7 days
        $last7Days = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $last7Days[] = [
                'date' => $date->format('M d'),
                'count' => Visitor::whereDate('visited_at', $date)->count()
            ];
        }

        // Monthly visitors (last 6 months)
        $monthlyVisitors = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $monthlyVisitors[] = [
                'month' => $month->format('M Y'),
                'count' => Visitor::whereYear('visited_at', $month->year)
                    ->whereMonth('visited_at', $month->month)
                    ->count()
            ];
        }

        return view('dashboard', compact(
            'totalVisitors',
            'totalProjects',
            'totalServices',
            'todayVisitors',
            'last7Days',
            'monthlyVisitors',
            'unreadCount'
        ));
    }
}