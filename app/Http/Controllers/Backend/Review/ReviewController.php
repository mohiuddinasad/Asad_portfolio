<?php

namespace App\Http\Controllers\Backend\Review;

use App\Http\Controllers\Controller;
use App\Models\Review\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('backends.review.index', compact('reviews'));
    }

    public function create()
    {
        return view('backends.review.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
       $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',


        ]);
        $review = new Review();
        $review->name = $request->name;
        $review->position = $request->position;
        $review->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('reviews', $imageName, 'public');
            $review->image = 'reviews/' . $imageName;
        }
        $review->save();
        return redirect()->route('dashboard.review.index')->with('success', 'Review submitted successfully!');
    }

    public function delete($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect()->route('dashboard.review.index')->with('success', 'Review deleted successfully!');
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('backends.review.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $review = Review::findOrFail($id);
        $review->name = $request->name;
        $review->position = $request->position;
        $review->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('reviews', $imageName, 'public');
            $review->image = 'reviews/' . $imageName;
        }

        $review->save();
        return redirect()->route('dashboard.review.index')->with('success', 'Review updated successfully!');
    }

}