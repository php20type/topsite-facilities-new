<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\Mail;
use Exception;
use Illuminate\Mail\Message;
use App\Notifications\UserNotification;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * 
     * 
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showUserRegisterForm()
    {
        return view('auth.register', ['url' => 'user']);
    }

    protected function createUser(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'token' => md5(uniqid())
        ]);

        try {
            $recipientEmail = 'crazycoder09@gmail.com';
            $email_subject = 'A new user registration is requested to be approved.';
            $user_name = 'Team'; // Assuming you want to use 'Team' as the user name if $user is not defined

            // Assuming $user is supposed to be a variable containing user information
            $user = $user ?? (object) ['name' => 'Unknown'];

            // Extracting user name from $user
            $user_name = isset ($user->name) ? $user->name : $user_name;

            $request_link = route('admin.request');

            $htmlContent = "<p>{$user_name} has requested for a new account on the portal. Please verify the details shared and approve the request by clicking the link below:</p>";
            $htmlContent .= "<p><a href=\"{$request_link}\">Approve Request</a></p>";

            Mail::send('emails.email', [
                'user_name' => $user_name,
                'htmlContent' => $htmlContent,
            ], function ($message) use ($recipientEmail, $email_subject) {
                $message->to($recipientEmail)
                    ->subject($email_subject)
                    ->from('topside@gmail.com', 'Alex');
            });

            $admin = User::find(1);
            // Assuming UserNotification expects recipient email, notification message, and sender email
            $admin->notify(new UserNotification($admin->email, "A new account request is received from {$user_name}.", $user->email, $request_link));

            return redirect()->route('customerlogin');
        } catch (Exception $e) {
            echo "Failed to send email: " . $e->getMessage();
        }

    }
}
