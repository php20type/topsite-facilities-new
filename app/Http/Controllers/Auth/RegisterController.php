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
use Illuminate\Support\Str;

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
            $recipientEmail = $user->email;
            $email_subject = 'Verify Your Account';
            $user_name = $user->name;
            $token = Str::random(60);

            $user = $user ?? (object) ['name' => 'Unknown'];

            $user_name = isset($user->name) ? $user->name : $user_name;
            $user->remember_token = $token;
            $user->save();
            $verification_link = route('verify.account', $token);

            Mail::send('emails.verify_account', [
                'user_name' => $user_name,
                'verification_link' => $verification_link,
            ], function ($message) use ($recipientEmail, $email_subject) {
                $message->to($recipientEmail)
                    ->subject($email_subject)
                    ->from('topside@gmail.com', 'Alex');
            });

            return redirect('/verify-page');
        } catch (Exception $e) {
            echo "Failed to send email: " . $e->getMessage();
        }

    }

    public function VerifyAccount($token)
    {
        $user = User::where('remember_token', $token)->first();

        if ($user) {
            $user->email_verified_at = now();
            $user->save();

            try {
                $recipientEmail = 'crazycoder09@gmail.com';
                $email_subject = 'A new user registration is requested to be approved.';
                $user_name = 'Team';

                $request_link = route('admin.request');

                $htmlContent = "<p>{$user->name} has requested for a new account on the portal. Please verify the details shared and approve the request by clicking the link below:</p>";
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
                $admin->notify(new UserNotification($admin->email, "A new account request is received from {$user->name}.", $user->email, $request_link));

                return redirect()->route('customerlogin');
            } catch (Exception $e) {
                echo "Failed to send email: " . $e->getMessage();
            }
        } else {
            // Token not found or user not associated with the token
            return redirect()->route('verification.error')->with('error', 'Invalid verification token.');
        }
    }
}
