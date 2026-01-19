<?php

namespace App\Http\Controllers\Frontend\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        ContactMessage::create($validated);

        return back()->with('success', 'Thank you! Your message has been sent successfully.');
    }
    public function layout()
    {
        $unreadCount = ContactMessage::where('is_read', false)->count();

        return view('backends.layout', compact('unreadCount'));
    }
    // Dashboard: Show all messages

    public function dashboard()
    {
        $messages = ContactMessage::latest()->paginate(10);
        $unreadCount = ContactMessage::where('is_read', false)->count();


        return view('backends.message.messageList', compact('messages', 'unreadCount'));
    }

    // Show single message
    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        $unreadCount = ContactMessage::where('is_read', false)->count();

        // Mark as read
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }

        return view('backends.message.message-detail', compact('message', 'unreadCount'));
    }

    // Delete message
    public function destroy($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return redirect()->route('dashboard.dashboard.messages')->with('success', 'Message deleted successfully.');
    }
}