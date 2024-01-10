<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        // Validate login request

        // Check user role
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (auth()->user()->is_admin) {
                return redirect()->route('home');
            } else {
                if(auth()->user()->email_verified_at !== null){
                    return redirect()->route('user.property.index');
                }else{
                    return redirect()->route('thank-you');
                }
                
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}
