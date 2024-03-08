<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Property;
use App\Models\PropertyDocument;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerApproveEmail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notifications\UserNotification;

use App\Models\User;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('is_approve', 1)->where('is_admin', 0)->get();
        $user = Auth::user();
        $notificationCount = $user->unreadNotifications->count();
        return view('admin.customer.list', compact('users', 'notificationCount'));
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
        $user = Auth::user();
        $notificationCount = $user->unreadNotifications->count();
        return view('admin.customer.show', compact('properties', 'users', 'notificationCount'));
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
        $property = Property::with('propertyType', 'propertyMedia', 'propertyDocument')->find($id);
        $indoorMedia = $property->propertyMedia()->where('category', 'indoor')->take(1)->get();
        $outdoorMedia = $property->propertyMedia()->where('category', 'outdoor')->take(1)->get();
        $service = Service::all();
        $user = Auth::user();
        $notificationCount = $user->unreadNotifications->count();
        if (!$property) {
            return response()->view('errors.404', [], 404);
        }

        return view('admin.customer.details', compact('property', 'indoorMedia', 'outdoorMedia', 'service', 'notificationCount'));
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
        $isApprove = $request->input('isApprov');

        $user = User::findOrFail($userId);
        $user->is_approve = $isApprove;
        $user->approve_at = Carbon::now();
        $user->save();

        $recipientEmail = $user->email;
        $email_subject = "Customer Approve Email From topeside";

        Mail::send('emails.customer_approve_email', ['recipientEmail' => $recipientEmail, 'email_subject' => $email_subject], function ($message) use ($recipientEmail, $email_subject) {
            $message->to($recipientEmail, 'topside')
                ->subject($email_subject);
            $message->from('topside@gmail.com', 'Alex');
        });

        $user1 = Auth::user();
        $user1->notify(new UserNotification($user1->email, 'Your custom message here'));
        // Mail::to($recipientEmail)->send(new CustomerApproveEmail());

        return response()->json(['message' => 'Status updated successfully'], 200);
    }
    public function upload(Request $request)
    {
        // Validate the request
        $request->validate([
            'fileUpload' => 'required|file|mimes:jpeg,png,pdf|max:2048', // Adjust file types and size as needed
            'property_id' => 'required|exists:properties,id'
        ]);

        // Handle file upload
        if ($request->hasFile('fileUpload')) {
            $file = $request->file('fileUpload');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            // Save the file path to the database
            $propertyDocument = new PropertyDocument();
            $propertyDocument->property_id = $request->property_id;
            $propertyDocument->document_path = $filePath;
            $propertyDocument->save();

            return response()->json(['message' => 'File uploaded successfully', 'document_path' => $filePath, 'document' => $propertyDocument], 200);
        }

        return response()->json(['message' => 'File upload failed'], 400);
    }

    public function deleteDocument(Request $request, $id)
    {
        $document = PropertyDocument::findOrFail($id);

        // Get the full path to the document
        $filePath = storage_path('app/public/' . $document->document_path);

        // Attempt to delete the file using unlink
        if (file_exists($filePath)) {
            unlink($filePath);
        } else {
            // Handle the case where the file does not exist
            return response()->json(['error' => 'File not found'], 404);
        }

        // Delete the document from the database
        $document->delete();

        // You might return a response here if needed
        return response()->json(['message' => 'Document deleted successfully']);
    }
}
