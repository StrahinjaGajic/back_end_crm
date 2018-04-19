<?php

namespace App\Http\Controllers;

use App\Country;
use App\Files;
use App\Http\Requests\PropertyRequest;
use App\Http\Requests\PropertyUpdateRequest;
use App\Image;
use App\Property;
use App\Tenant;
use Helmesvs\Notify\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::all();

        return view('pages.admin.property_list')->with('properties', $properties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();

        return view('pages.admin.add_property')->with('countries',$countries);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {
        $product = Property::create($request->all());

        foreach ($request->photos as $photo) {

            $filename = Storage::disk('uploads')->put('PropertyPhotos',$photo);

            $product->images()->create([
                'path' => $filename,
                'imageable_id' => $product->id,
                'imageable_type' => get_class($product)
            ]);
        }
        foreach ($request->property_files as $p_files) {

            $filename = Storage::disk('uploads')->put('PropertyFiles',$p_files);

            $product->files()->create([
                'path' => $filename,
                'fileable_id' => $product->id,
                'fileable_type' => get_class($product)
            ]);
        }
    return redirect()->route('admin.property-list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::find($id);
        $tenant = $property->getSingleTenant($property->tenant_id);
        $propertyFiles = Property::find($id)->files->toArray();

        return view('pages.admin.show_property')
            ->with('property',$property)
            ->with('tenant',$tenant)
            ->with('propertyFiles',$propertyFiles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = Property::findOrFail($id);

        $countries = Country::all();

        $propertyImages = Property::find($id)->images->toArray();

        $propertyFiles = Property::find($id)->files->toArray();

        return view('pages.admin.edit_property')
            ->with('property', $property)
            ->with('countries', $countries)
            ->with('propertyImages', $propertyImages)
            ->with('propertyFiles', $propertyFiles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyUpdateRequest $request, $id)
    {
        $property = Property::findOrFail($id);

        $property->update($request->all());

        if($request->photos) {
            foreach ($request->photos as $photo) {

                $filename = Storage::disk('uploads')->put('PropertyPhotos', $photo);

                $property->images()->create([
                    'path' => $filename,
                    'imageable_id' => $property->id,
                    'imageable_type' => get_class($property)
                ]);
            }
        }
        if($request->property_files) {
            foreach ($request->property_files as $p_files) {

                $filename = Storage::disk('uploads')->put('PropertyFiles', $p_files);

                $property->files()->create([
                    'path' => $filename,
                    'fileable_id' => $property->id,
                    'fileable_type' => get_class($property)
                ]);
            }
        }
        return redirect()->route('admin.property-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $getFilesToDelete = Files::all()->where('fileable_id','=',$id)->where('fileable_type','=','App\Property');
        $getImagesToDelete = Image::all()->where('imageable_id','=',$id)->where('imageable_type','=','App\Property');

        foreach ($getImagesToDelete as $imageToDelete):
            Storage::disk('uploads')->delete($imageToDelete->path);
            $imageToDelete->delete();
        endforeach;

        foreach ($getFilesToDelete as $fileToDelete):
            Storage::disk('uploads')->delete($fileToDelete->path);
            $fileToDelete->delete();
        endforeach;

        Tenant::where('property', $id)
            ->update(['property' => null]);

        $property->delete();
    }
    public function getAssignedProperties() {

        $properties = Property::all()->where('tenant_id','!=',null);

        return view('pages.admin.rented_properties')->with('properties',$properties);
    }
    public function getNonAssignedProperties() {

        $properties = Property::all()->where('tenant_id','=',null);

        return view('pages.admin.free_properties')->with('properties',$properties);
    }
    public function destroySingleImage(Request $request, $id) {

        if($request->ajax()) {

            $image = Image::where('id',$id)->first();

            Storage::disk('uploads')->delete($image->path);

            $image->delete();

            return response()->json([
                'response' => true,
                'target' => $id
            ]);
        } else {
            return response()->json([
                'response' => false,
                'message' => 'Image isn\'t deleted'
            ]);
        }
    }

    public function destroySingleFile(Request $request, $id) {

        if($request->ajax()) {

            $file = Files::where('id',$id)->first();

            Storage::disk('uploads')->delete($file->path);

            $file->delete();

            return response()->json([
                'response' => true,
                'target' => $id
            ]);
        } else {
            return response()->json([
                'response' => false,
                'message' => 'File isn\'t deleted'
            ]);
        }
    }
}
