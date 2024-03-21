<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Property;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserNotification;

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
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('customerlogin');
        }
        $notificationCount = $user->unreadNotifications->count();

        return view('customer.services.show', compact('service', 'property', 'services', 'serviceId', 'status', 'notificationCount'));
    }
    public function updateServiceStatus(Request $request)
    {
        // Retrieve service and property IDs and the new status from the request
        $serviceId = $request->input('service_id');
        $propertyId = $request->input('property_id');
        $newStatus = $request->input('status');

        // Retrieve the property
        $property = Property::findOrFail($propertyId);
        $service = Service::find($serviceId);

        // Update the status in the pivot table
        $property->services()->updateExistingPivot($serviceId, ['status' => $newStatus]);
        $subject = 'Got some new notes!';
        if ($newStatus == 'Done') {
            $subject = 'Your work is approved!';
        }
        try {
            $recipientEmail = 'crazycoder09@gmail.com';
            $email_subject = $subject;
            $user_name = 'Team';
            $chat_link = route('admin.service.show', ['property' => $propertyId, 'service' => $serviceId]);
            $property_name = $property->name;

            // Generate HTML content
            $htmlContent = "<p>The {$service->name} work on {$property_name} which was ready for review is approved by {$property->user->name}.</p>";
            $htmlContent .= "<p>You can check the same from here: {$chat_link} </p>";

            // Send email with blade view
            Mail::send('emails.email', ['htmlContent' => $htmlContent, 'user_name' => $user_name], function ($message) use ($recipientEmail, $email_subject) {
                $message->to($recipientEmail)
                    ->subject($email_subject)
                    ->from('topside@gmail.com', 'Alex');
            });

            $admin = User::find(1);
            $admin->notify(new UserNotification($admin->email, "{$property->user->name} changed the status of {$service->name} to {$newStatus} for {$property_name}.", $property->user->email, $chat_link));

            return response()->json(['message' => 'Status updated successfully'], 200);
        } catch (Exception $e) {
            return "Failed to send email: " . $e->getMessage();
        }

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
