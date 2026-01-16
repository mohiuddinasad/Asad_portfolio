<?php

namespace App\Http\Controllers\Frontend\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // মেসেজ পাঠানো
    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // সহজভাবে create ব্যবহার করুন
        Contact::create($request->only('name', 'email', 'subject', 'message'));

        // মেসেজ পাঠানোর পর লিস্ট পেজে রিডাইরেক্ট করুন
        return redirect()->route('frontend.contact.save')
                         ->with('success', 'Your message has been sent successfully!');
    }

    // সব মেসেজ দেখানো
    public function save()
    {
        $messages = Contact::latest()->get(); // সর্বশেষ মেসেজ আগে দেখাবে
        return view('backends.layout', compact('messages'));
    }
}