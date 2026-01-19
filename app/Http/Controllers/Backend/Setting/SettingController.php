<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Models\Contact\ContactMessage;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function profileSetting()
    {
        $unreadCount = ContactMessage::where('is_read', false)->count();
        return view('backends.setting.setting', compact('unreadCount'));
    }
}