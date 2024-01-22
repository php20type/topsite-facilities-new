<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

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
        $properties = Property::with('propertyType', 'propertyService')->where('user_id', $id)->orderBy('created_at', 'desc')->get();
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
        $property = Property::with('propertyType', 'propertyService', 'propertyMedia')->find($id);
        $indoorMedia = $property->propertyMedia()->where('category', 'indoor')->take(1)->get();
        $outdoorMedia = $property->propertyMedia()->where('category', 'outdoor')->take(1)->get();

        if (!$property) {
            return response()->view('errors.404', [], 404);
        }

        return view('admin.customer.details', compact('property', 'indoorMedia', 'outdoorMedia'));
    }

}
