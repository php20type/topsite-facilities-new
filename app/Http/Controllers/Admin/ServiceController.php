<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Property;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Exception;
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
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('adminlogin');
        }
        $notificationCount = $user->unreadNotifications->count();
        $service = Service::findOrFail($serviceId);
        $property = Property::findOrFail($propertyId);
        $services = $property->services()->get();
        $status = $property->services()->where('services.id', $serviceId)->first()->pivot->status;
        $messages = Chat::orderBy('created_at', 'asc')->get();
        return view('admin.services.show', compact('service', 'property', 'services', 'messages', 'serviceId', 'notificationCount', 'status'));
    }


    public function updateServiceStatus(Request $request)
    {
        // Retrieve service and property IDs and the new status from the request
        $serviceId = $request->input('service_id');
        $propertyId = $request->input('property_id');
        $newStatus = $request->input('status');

        $service = Service::find($serviceId);

        // Retrieve the property
        $property = Property::findOrFail($propertyId);

        // Update the status in the pivot table
        $property->services()->updateExistingPivot($serviceId, ['status' => $newStatus]);

        try {
            $recipientEmail = $property->user->email; //   
            $email_subject = 'Your requirement of ' . $service->name . ' is ' . $newStatus . ' now';
            $user_name = $property->user->name;
            $chat_link = route('user.service.show', ['property' => $propertyId, 'service' => $serviceId]);
            $property_name = $property->name;

            // Generate HTML content
            $htmlContent = "<p>The status of {$service->name} is changed to {$newStatus} for {$property_name}.</p>";
            $htmlContent .= "<p>You can kindly check the same from here: {$chat_link} </p>";

            // Send email with blade view
            Mail::send('emails.email', ['htmlContent' => $htmlContent, 'user_name' => $user_name], function ($message) use ($recipientEmail, $email_subject) {
                $message->to($recipientEmail)
                    ->subject($email_subject)
                    ->from('topside@gmail.com', 'Alex');
            });

            $user = $property->user;
            $user->notify(new UserNotification($user->email, "TSF changed the status of {$service->name} to {$newStatus} for {$property_name}.", "admin@gmail.com", $chat_link));

            return response()->json(['message' => 'Status updated successfully'], 200);
        } catch (Exception $e) {
            return "Failed to send email: " . $e->getMessage();
        }
        // Return a response (optional)

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
