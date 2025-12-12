<?php

namespace App\Http\Controllers\Backend\MyProfile;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MyProfileController extends Controller
{

    // profile info updated

    public function profileView()
    {
        $user = Auth::user();
        return view('backends.myProfile.profileView', compact('user'));
    }

    public function profileEdit()
    {
        $user = Auth::user();
        return view('backends.myProfile.editProfile', compact('user'));

    }
    public function profileInfo(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'experience' => 'required',
            'age' => 'required',
            'description' => 'required',
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add image validation
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->title = $request->title;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->experience = $request->experience;
        $user->age = $request->age;
        $user->description = $request->description;

        // Handle image upload
        if ($request->hasFile('user_image')) {
            // Delete old image if exists
            if ($user->user_image && file_exists(public_path($user->user_image))) {
                unlink(public_path($user->user_image));
            }

            // Upload new image
            $image = $request->file('user_image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/users'), $imageName);
            $user->user_image = 'uploads/users/' . $imageName;
        }

        $user->save();
        return redirect()->route('dashboard.my.profile')->with('success', 'Profile Updated Successfully');
    }

    // Password update method

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Check if current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password is incorrect');
        }

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password updated successfully');
    }
}