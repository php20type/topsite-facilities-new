<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except(['adminLogout', 'showUserLoginForm', 'userLogout']);
        $this->middleware('guest:user')->except(['userLogout', 'showAdminLoginForm', 'adminLogout']);
    }

    public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            $token = md5(uniqid());
            Admin::where('id', Auth::guard('admin')->user()->id)->update([
                'token' => $token
            ]);
            return redirect()->route('admin.customer.index');
        } else {
            // Login attempt failed
            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                'error' => 'Invalid email or password. Please try again.',
            ]);
        }
        // return back()->withInput($request->only('email', 'remember'));
    }

    public function showUserLoginForm()
    {
        return view('auth.login', ['url' => 'user']);
    }

    public function userLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            if (Auth::guard('user')->user()->email_verified_at !== null) {
                $token = md5(uniqid());
                User::where('id', Auth::guard('user')->user()->id)->update([
                    'token' => $token
                ]);
                return redirect()->route('user.property.index');
            } else {
                return redirect('/thank-you');
            }
        } else {
            // Login attempt failed
            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                'error' => 'Invalid email or password. Please try again.',
            ]);
        }
    }

    public function userLogout()
    {
        auth('user')->logout();

        return redirect('/login/user');
    }

    public function adminLogout()
    {
        auth('admin')->logout();

        return redirect('/login/admin');
    }

}
