<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Response;
use Carbon\Carbon;

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
        $this->middleware('guest')->except('logout');
        // $this->middleware('guest:admin')->except(['adminLogout', 'showUserLoginForm', 'userLogout']);
        // $this->middleware('guest:user')->except(['userLogout', 'showAdminLoginForm', 'adminLogout']);
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
            if (Auth::guard('user')->user()->approve_at !== null && Auth::guard('user')->user()->is_approve == 1) {
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
        if (Auth::check()) {
            $user = Auth::user();
            $user->token = null;
            $user->save();
            Auth::logout();
        }
        // auth('user')->logout();

        return redirect('/');
        // return redirect('/login/user');
    }

    public function adminLogout()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user->token = null;
            $user->save();
            Auth::logout();
        }
        // auth('admin')->logout();

        return redirect('/');
        // return redirect('/login/user');
    }

    public function logout(Request $request)
    {

        $user = Auth::user();
        $user->token = null;
        $user->last_login = Carbon::now();
        $user->save();

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

        // if (Auth::check()) {
        //     $user = Auth::user();
        //     $user->token = null;
        //     $user->save();
        //     Auth::logout();
        // }

        // return redirect()->route('loginpage')->withHeaders([
        //     'Cache-Control' => 'no-cache, no-store, max-age=0, must-revalidate',
        //     'Pragma' => 'no-cache',
        //     'Expires' => 'Fri, 01 Jan 1990 00:00:00 GMT'
        // ]);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            if (request()->getHttpHost() === 'admin.topsidefacilities.test') {
                if ($user->is_admin) {
                    // Admin user
                    $token = md5(uniqid());
                    $user->update(['token' => $token]);

                    return redirect()->route('admin.customer.index');
                } else {
                    return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                        'error' => 'Invalid email or password. Please try again.',
                    ]);
                }
            } else {

                if ($user->is_admin) {
                    return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                        'error' => 'Invalid email or password. Please try again.',
                    ]);
                } else {
                    // Regular user
                    if ($user->approve_at !== null && $user->is_approve == 1) {
                        $token = md5(uniqid());
                        $user->update(['token' => $token]);

                        return redirect()->route('user.property.index');
                    } else {
                        return redirect('/thank-you');
                    }
                }
            }

        } else {
            // Login attempt failed
            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                'error' => 'Invalid email or password. Please try again.',
            ]);
        }
    }


}
