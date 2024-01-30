<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Property;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerApproveEmail;

use App\Models\User;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereNotNull('email_verified_at')->where('is_approve', 1)->get();
        return view('admin.customer.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $properties = Property::with('propertyType')->where('user_id', $id)->orderBy('created_at', 'desc')->get();
        $users = User::find($id);
        return view('admin.customer.show', compact('properties', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /** 
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /** 
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function propertyDetails(string $id)
    {
        $property = Property::with('propertyType', 'propertyMedia')->find($id);
        $indoorMedia = $property->propertyMedia()->where('category', 'indoor')->take(1)->get();
        $outdoorMedia = $property->propertyMedia()->where('category', 'outdoor')->take(1)->get();
        $service = Service::all();

        if (!$property) {
            return response()->view('errors.404', [], 404);
        }

        return view('admin.customer.details', compact('property', 'indoorMedia', 'outdoorMedia', 'service'));
    }

    public function searchProperties(Request $request)
    {
        $searchQuery = $request->input('search_query');
        $user_id = $request->input('user_id');
        $properties = Property::with('propertyType')
            ->where('user_id', $user_id)
            ->where('name', 'like', '%' . $searchQuery . '%')
            ->orderBy('created_at', 'desc')
            ->get();
        return response()->json($properties);
    }
    public function updateStatus(Request $request)
    {
        $userId = $request->input('userId');
        $isApprov = $request->input('isApprov');

        $user = User::findOrFail($userId);
        $user->is_approve = $isApprov;
        $user->save();

        $recipientEmail = $user->email;
        // $to_email = $user->email;
        // $app_from_address = Config('mail.from.address');
        // $app_from_name = Config('mail.from.name');
        // $subject = "hello";

        // Mail::send([], [], function ($message) use ($to_name, $to_email, $app_from_name, $app_from_address, $subject) {
        //     $message->to($to_email, $to_name)->subject($subject);
        //     $message->from($app_from_address, $app_from_name);
        // });

        Mail::to($recipientEmail)->send(new CustomerApproveEmail());

        return response()->json(['message' => 'Status updated successfully'], 200);
    }
}
