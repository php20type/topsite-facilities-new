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
        return view('customer.profile.index', compact('user'));
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
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::findorFail($request->input('id'));
        $user->update($request->only(['name', 'email']));

        return redirect()->back()->with('success', 'Your profile has been updated successfully.');
    }


    public function adminProfile()
    {
        if (Auth::check()) {
            $user = User::findorFail(Auth::user()->id);
            return view('admin.profile.index', compact('user'));
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
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::findorFail($request->input('id'));
        $user->update($request->only(['name', 'email']));

        return redirect()->back()->with('success', 'Your profile has been updated successfully.');
    }
}
