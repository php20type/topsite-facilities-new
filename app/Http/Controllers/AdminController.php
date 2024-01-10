<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate login request
        // Check admin role
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (auth()->user()->is_admin) {
                return redirect()->route('home');
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('auth.login');
    }
}
