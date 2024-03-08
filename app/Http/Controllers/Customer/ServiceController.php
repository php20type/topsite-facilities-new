<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show($propertyId, $serviceId)
    {
        $service = Service::findOrFail($serviceId);
        $property = Property::findOrFail($propertyId);
        $services = $property->services()->get();
        $status = $property->services()->where('services.id', $serviceId)->first()->pivot->status;
        return view('customer.services.show', compact('service', 'property', 'services', 'serviceId', 'status'));
    }
    public function updateServiceStatus(Request $request)
    {
        // Retrieve service and property IDs and the new status from the request
        $serviceId = $request->input('service_id');
        $propertyId = $request->input('property_id');
        $newStatus = $request->input('status');

        // Retrieve the property
        $property = Property::findOrFail($propertyId);

        // Update the status in the pivot table
        $property->services()->updateExistingPivot($serviceId, ['status' => $newStatus]);

        // Return a response (optional)
        return response()->json(['message' => 'Status updated successfully'], 200);
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
}
