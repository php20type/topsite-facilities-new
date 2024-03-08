<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $notificationCount = $user->unreadNotifications->count();
        $users = User::where('is_approve', 0)->where('is_admin', 0)->get();
        $requests = User::where('is_approve', 1)->where('is_admin', 0)->get();
        return view('admin.request.list', compact('users', 'requests', 'notificationCount'));
    }
}
