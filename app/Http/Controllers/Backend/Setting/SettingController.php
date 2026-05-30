<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Models\Contact\ContactMessage;
use App\Models\Setting;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function profileSetting()
    {
        $logo = Setting::get('logo');
        $cv = Setting::get('cv');
        $socialLinks = SocialLink::orderBy('order')->get();
        $unreadCount = ContactMessage::where('is_read', false)->count();

        return view('backends.setting.setting', compact('unreadCount', 'logo', 'cv', 'socialLinks'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:5120',
        ]);

        // ✅ Logo Upload
        if ($request->hasFile('logo')) {

            $oldLogo = Setting::get('logo');
            if ($oldLogo && file_exists(public_path($oldLogo))) {
                unlink(public_path($oldLogo));
            }

            $logo = $request->file('logo');
            $logoName = time() . '_logo.' . $logo->getClientOriginalExtension();

            $logo->move(public_path('uploads/settings'), $logoName);

            Setting::set('logo', 'uploads/settings/' . $logoName);
        }

        // ✅ CV Upload
        if ($request->hasFile('cv')) {

            $oldCv = Setting::get('cv');
            if ($oldCv && file_exists(public_path($oldCv))) {
                unlink(public_path($oldCv));
            }

            $cv = $request->file('cv');
            $cvName = time() . '_cv.' . $cv->getClientOriginalExtension();

            $cv->move(public_path('uploads/settings'), $cvName);

            Setting::set('cv', 'uploads/settings/' . $cvName);
        }

        return back()->with('success', 'Settings updated successfully!');
    }

    public function storeSocialLink(Request $request)
    {
        $request->validate([
            'platform' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'order' => 'nullable|integer',
        ]);

        SocialLink::create([
            'platform' => $request->platform,
            'icon' => $request->icon,
            'url' => $request->url,
            'order' => $request->order ?? 0,
            'is_active' => true,
        ]);

        return back()->with('success', 'Social link added successfully!');
    }

    public function updateSocialLink(Request $request, SocialLink $socialLink)
    {
        $request->validate([
            'platform' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'order' => 'nullable|integer',
        ]);

        $socialLink->update([
            'platform' => $request->platform,
            'icon' => $request->icon,
            'url' => $request->url,
            'order' => $request->order ?? 0,
        ]);

        return back()->with('success', 'Social link updated successfully!');
    }

    public function destroySocialLink(SocialLink $socialLink)
    {
        $socialLink->delete();
        return back()->with('success', 'Social link deleted successfully!');
    }

    public function toggleSocialLink(SocialLink $socialLink)
    {
        $socialLink->update(['is_active' => !$socialLink->is_active]);
        return back()->with('success', 'Social link status updated!');
    }
}