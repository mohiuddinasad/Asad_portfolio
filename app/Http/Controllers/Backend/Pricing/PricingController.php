<?php

namespace App\Http\Controllers\Backend\Pricing;
use App\Http\Controllers\Controller;
use App\Models\Contact\ContactMessage;
use App\Models\Pricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PricingController extends Controller
{
    /**
     * Display a listing of pricing plans.
     */
    public function index()
    {
        $unreadCount = ContactMessage::where('is_read', false)->count();
        $pricings = Pricing::latest()->get();
        return view('backends.pricing.index', compact('pricings', 'unreadCount'));
    }

    /**
     * Show the form for creating a new pricing plan.
     */
    public function create()
    {
        $unreadCount = ContactMessage::where('is_read', false)->count();
        return view('backends.pricing.create', compact('unreadCount'));
    }

    /**
     * Store a newly created pricing plan in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'price' => 'required|string|max:255',
            'features' => 'nullable|array',
            'features.*' => 'string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Filter out empty features
            $features = $request->features ? array_filter($request->features, function($feature) {
                return !empty(trim($feature));
            }) : [];

            Pricing::create([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'price' => $request->price,
                'features' => array_values($features), // Re-index array
            ]);

            return redirect()->route('dashboard.pricing.index')
                ->with('success', 'Pricing plan created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to create pricing plan. Please try again.')
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified pricing plan.
     */
    public function edit($id)
    {
        $unreadCount = ContactMessage::where('is_read', false)->count();
        $pricing = Pricing::findOrFail($id);
        return view('backends.pricing.edit', compact('pricing', 'unreadCount'));
    }

    /**
     * Update the specified pricing plan in storage.
     */
    public function update(Request $request, $id)
    {
        $pricing = Pricing::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'price' => 'required|string|max:255',
            'features' => 'nullable|array',
            'features.*' => 'string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Filter out empty features
            $features = $request->features ? array_filter($request->features, function($feature) {
                return !empty(trim($feature));
            }) : [];

            $pricing->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'price' => $request->price,
                'features' => array_values($features), // Re-index array
            ]);

            return redirect()->route('dashboard.pricing.index')
                ->with('success', 'Pricing plan updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to update pricing plan. Please try again.')
                ->withInput();
        }
    }

    /**
     * Remove the specified pricing plan from storage.
     */
    public function destroy($id)
    {
        try {
            $pricing = Pricing::findOrFail($id);
            $pricing->delete();

            return redirect()->route('dashboard.pricing.index')
                ->with('success', 'Pricing plan deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to delete pricing plan. Please try again.');
        }
    }
}
