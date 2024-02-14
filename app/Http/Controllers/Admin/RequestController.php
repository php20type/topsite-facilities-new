<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('is_approve', 0)->get();
        $requests = User::where('is_approve', 1)->get();
        return view('admin.request.list', compact('users', 'requests'));
    }
}
