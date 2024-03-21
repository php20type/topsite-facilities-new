<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('customerlogin');
        }
        $notificationCount = $user->unreadNotifications->count();

        $notifications = auth()->user()->notifications;
        return view('customer.notification.index', compact('notifications', 'notificationCount'));
    }
    public function markAsRead(Request $request)
    {
        $notificationId = $request->input('notification_id');
        $notification = Auth::user()->notifications()->where('id', $notificationId)->first();
        $notification->markAsRead();

        // Return the URL to redirect to
        return response()->json(['redirect_to' => $notification['data']['desired_url']]);

    }
}
