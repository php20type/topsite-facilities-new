<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PropertyType;
use App\Models\Service;
use App\Models\Property;
use App\Models\PropertyMedia;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function __construct()
    {
        if (Auth::user() == null) {
            $this->middleware('auth');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::with('propertyType')->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('customer.property.list', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array();
        $types = PropertyType::pluck("name", "id");
        $data['types'] = $this->prependFontAwesomeIcon($types);
        $data['services'] = Service::pluck("name", "id");
        return view("customer.property.create", $data);
    }

    private function prependFontAwesomeIcon($options)
    {
        // Prepend the Font Awesome icon to each option
        return $options->map(function ($option, $id) {
            switch ($id) {
                case 1:
                    return '&#xf015; ' . $option; // Residential icon
                case 2:
                    return '&#xf7ee; ' . $option; // Land icon
                case 3:
                    return '&#xf1ad; ' . $option; // Commercial icon
                default:
                    return $option;
            }
        })->toArray();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'address1' => 'required|string',
            'address2' => 'nullable|string',
            'bedrooms' => 'nullable|integer',
            'bathrooms' => 'nullable|integer',
            'parking' => 'nullable|boolean',
            'area' => 'required|integer',
            'property_type_id' => 'required|exists:property_types,id',
            'indoor_images.*' => 'file|mimes:jpeg,png,jpg,gif,mp4,avi,wmv|max:256000',
            'outdoor_images.*' => 'file|mimes:jpeg,png,jpg,gif,mp4,avi,wmv|max:256000'
        ]);

        $validatedData['user_id'] = Auth::user()->id;
        $property = Property::create($validatedData);

        // Get the selected service IDs from the form
        $selectedServices = $request->input('property_service_id');

        // Attach selected services to the property with status "New"
        foreach ($selectedServices as $serviceId) {
            $property->services()->attach($serviceId, ['status' => 'New']);
        }

        // Handle indoor images
        if ($request->hasFile('indoor_images')) {
            foreach ($request->file('indoor_images') as $file) {
                $path = $file->store('indoor_images', 'public'); // Store file in the 'public' disk under the 'indoor_images' directory
                // Save file path and type in the database
                PropertyMedia::create([
                    'property_id' => $property->id,
                    'file_path' => $path,
                    'category' => 'indoor', // Save the MIME type of the file (image or video)
                ]);
            }
        }

        // Handle outdoor images upload and storage
        if ($request->hasFile('outdoor_images')) {
            foreach ($request->file('outdoor_images') as $image) {
                $path = $image->store('outdoor_images', 'public'); // Store image in the 'public' disk under the 'outdoor_images' directory
                // Save image path in the database
                PropertyMedia::create([
                    'property_id' => $property->id,
                    'file_path' => $path,
                    'category' => 'outdoor',
                ]);
            }
        }

        return redirect()->route('user.property.index')->with('success', 'Property created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::with('propertyType', 'propertyMedia', 'propertyDocument')->find($id);
        $indoorMedia = $property->propertyMedia()->where('category', 'indoor')->take(1)->get();
        $outdoorMedia = $property->propertyMedia()->where('category', 'outdoor')->take(1)->get();

        if (!$property) {
            return response()->view('errors.404', [], 404);
        }

        return view('customer.property.show', compact('property', 'indoorMedia', 'outdoorMedia'));
    }

    public function fetchMoreMedia(Request $request)
    {
        $category = $request->input('category');
        $page = $request->input('page');
        $property_id = $request->input('property');
        $perPage = 1;

        $moreMedia = PropertyMedia::where(function ($query) use ($category, $property_id) {
            if (!empty ($category)) {
                $query->where('category', $category);
            }

            if (!empty ($property_id)) {
                $query->where('property_id', $property_id);
            }
        })->skip(($page - 1) * $perPage)->take($perPage)->get();

        if ($moreMedia->isEmpty()) {
            return response()->json(['status' => 'not_found', 'data' => []]);
        } else {
            $page_new = $page + 1;
            $moreMed = PropertyMedia::where(function ($query) use ($category, $property_id) {
                if (!empty ($category)) {
                    $query->where('category', $category);
                }

                if (!empty ($property_id)) {
                    $query->where('property_id', $property_id);
                }
            })->skip(($page_new - 1) * $perPage)->take($perPage)->get();
            if ($moreMed->isEmpty()) {
                return response()->json(['status' => 'no_more_media', 'data' => $moreMedia]);
            } else {
                return response()->json(['status' => 'find_media', 'data' => $moreMedia]);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = array();
        $data['property'] = Property::with('propertyType', 'propertyMedia', 'propertyDocument', 'services')->find($id);
        $types = PropertyType::pluck("name", "id");
        $data['types'] = $this->prependFontAwesomeIcon($types);
        $data['services'] = Service::pluck("name", "id");

        return view("customer.property.create", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'address1' => 'required|string',
            'address2' => 'nullable|string',
            'bedrooms' => 'nullable|integer',
            'bathrooms' => 'nullable|integer',
            'parking' => 'nullable|boolean',
            'area' => 'required|integer',
            'property_type_id' => 'required|exists:property_types,id',
            'indoor_images.*' => 'file|mimes:jpeg,png,jpg,gif,mp4,avi,wmv|max:256000',
            'outdoor_images.*' => 'file|mimes:jpeg,png,jpg,gif,mp4,avi,wmv|max:256000'
        ]);

        $property = Property::findOrFail($id);

        // Update the existing property with the validated data
        $property->update($validatedData);

        // Update the selected services for the property
        $property->services()->detach();

        // Attach new services
        foreach ($request->property_service_id as $serviceId) {
            $property->services()->attach($serviceId, ['status' => 'New']);
        }

        // Handle indoor images
        if ($request->hasFile('indoor_images')) {
            // Delete existing indoor images
            $existingIndoorImages = PropertyMedia::where('property_id', $property->id)->where('category', 'indoor')->get();
            foreach ($existingIndoorImages as $existingIndoorImage) {
                $filePath = storage_path('app/public/' . $existingIndoorImage->file_path);
                if (file_exists($filePath)) {
                    unlink($filePath);
                    $existingIndoorImage->delete();
                } else {
                    // Handle the case where the file does not exist
                    return redirect()->back()->with('error', 'Indoor images: File not found!');
                }
            }

            // Store and create new indoor images
            foreach ($request->file('indoor_images') as $file) {
                $path = $file->store('indoor_images', 'public');
                PropertyMedia::create([
                    'property_id' => $property->id,
                    'file_path' => $path,
                    'category' => 'indoor',
                ]);
            }
        }

        // Handle outdoor images
        if ($request->hasFile('outdoor_images')) {
            // Delete existing outdoor images
            $existingOutdoorImages = PropertyMedia::where('property_id', $property->id)->where('category', 'outdoor')->get();
            foreach ($existingOutdoorImages as $existingOutdoorImage) {
                $filePath = storage_path('app/public/' . $existingOutdoorImage->file_path);
                if (file_exists($filePath)) {
                    unlink($filePath);
                    $existingOutdoorImage->delete();
                } else {
                    // Handle the case where the file does not exist
                    return redirect()->back()->with('error', 'Outdoor images: File not found!');
                }
            }

            // Store and create new outdoor images
            foreach ($request->file('outdoor_images') as $image) {
                $path = $image->store('outdoor_images', 'public');
                PropertyMedia::create([
                    'property_id' => $property->id,
                    'file_path' => $path,
                    'category' => 'outdoor',
                ]);
            }
        }

        return redirect()->route('user.property.index')->with('success', 'Property updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteMedia($mediaId)
    {
        // Find the media by ID and delete it from the database
        $media = PropertyMedia::findOrFail($mediaId);

        // Get the full path to the document
        $filePath = storage_path('app/public/' . $media->file_path);

        // Attempt to delete the file using unlink
        if (file_exists($filePath)) {
            unlink($filePath);
        } else {
            // Handle the case where the file does not exist
            return response()->json(['status' => 404, 'message' => 'File not found'], 404);
        }

        if ($media->delete()) {
            // Return a response indicating success
            return response()->json(['status' => 200, 'message' => 'Media deleted successfully!'], 200);
        } else {
            // Return a response indicating error
            return response()->json(['status' => 404, 'message' => 'Media not deleted!'], 404);
        }
    }

}
