<?php

namespace App\Http\Controllers\Customer;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::findorFail(Auth::user()->id);
        $notificationCount = $user->unreadNotifications->count();
        return view('customer.profile.index', compact('user', 'notificationCount'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($request->input('id')),
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($request->input('id')),
            ],
            'birthdate' => 'nullable|date',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'background' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('customer_images', 'public');

            // Update the user's profile picture path in the database
            $user = User::findOrFail($request->input('id'));
            $user->profile_picture = $path;
            $user->save();
        }

        $user = User::findOrFail($request->input('id'));
        $user->update($request->only(['name', 'email', 'birthdate', 'phone', 'address', 'background']));

        return redirect()->back()->with('success', 'Your profile has been updated successfully.');
    }


    public function adminProfile()
    {
        if (Auth::check()) {
            $user = User::findorFail(Auth::user()->id);
            $notificationCount = $user->unreadNotifications->count();
            return view('admin.profile.index', compact('user', 'notificationCount'));
        } else {
            return redirect()->to('/');
        }
    }

    public function adminUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($request->input('id')),
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($request->input('id')),
            ],
            'birthdate' => 'nullable|date',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'background' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('customer_images', 'public');

            // Update the user's profile picture path in the database
            $user = User::findOrFail($request->input('id'));
            $user->profile_picture = $path;
            $user->save();
        }

        $user = User::findOrFail($request->input('id'));
        $user->update($request->only(['name', 'email', 'birthdate', 'phone', 'address', 'background']));

        return redirect()->back()->with('success', 'Your profile has been updated successfully.');
    }
}
