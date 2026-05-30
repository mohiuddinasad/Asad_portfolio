<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Track only unique visits per day per IP
        $ip = $request->ip();
        $today = now()->startOfDay();

        $existingVisit = Visitor::where('ip_address', $ip)
            ->whereDate('visited_at', $today)
            ->first();

        if (!$existingVisit) {
            Visitor::create([
                'ip_address' => $ip,
                'user_agent' => $request->userAgent(),
                'page_url' => $request->fullUrl(),
                'visited_at' => now()
            ]);
        }

        return $next($request);
    }
}