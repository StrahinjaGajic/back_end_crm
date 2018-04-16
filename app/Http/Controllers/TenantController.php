<?php

namespace App\Http\Controllers;

use App\Country;
use App\Files;
use App\Http\Requests\TenantRequest;
use App\Http\Requests\TenantUpdateRequest;
use App\Image;
use App\Property;
use App\Tenant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allTenantsWithProperties = Tenant::all();

        return view('pages.admin.tenant_list')->with('tenants', $allTenantsWithProperties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();

        $properties = Property::where('tenant_id','=',null)->get()->toArray();

        return view('pages.admin.add_tenant')->with('countries',$countries)->with('properties', $properties);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TenantRequest $request)
    {
        $tenant = Tenant::create($request->all());

        foreach ($request->tenant_image as $photo) {

            $filename = Storage::disk('uploads')->put('TenantImages',$photo);

            $tenant->images()->create([
                'path' => $filename,
                'imageable_id' => $tenant->id,
                'imageable_type' => get_class($tenant)
            ]);
        }


        foreach ($request->supporting_files as $p_files) {

            $filename = Storage::disk('uploads')->put('TenantFiles',$p_files);

            $tenant->files()->create([
                'path' => $filename,
                'fileable_id' => $tenant->id,
                'fileable_type' => get_class($tenant)
            ]);
        }
        if($request->property !== null) {
            Property::where('id', $request->property)
                ->update(['tenant_id' => $tenant->id]);
        }

        return Redirect::to(route('admin.tenant-list'))->with('message', 'You have successfully created an tenant');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tenant = Tenant::find($id);

        return view('pages.admin.display_tenant')->with('tenant',$tenant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::all();

        $tenant = Tenant::find($id)->toArray();

        $tenantPropertyId = Tenant::find($id)->property; //returns specific property for that tenant

        $properties = Property::where('tenant_id','=',null)->orWhere('tenant_id','=',$tenant['id'])->get(); //take rows which are not assigned by other tenant and row that is currently assigned

        $tenantImages = Tenant::find($id)->images->toArray();

        $tenantFiles = Tenant::find($id)->files->toArray();

        return view('pages.admin.edit_tenant')
            ->with('tenant', $tenant)
            ->with('countries', $countries)
            ->with('tenantPropertyId',$tenantPropertyId)
            ->with('properties', $properties)
            ->with('tenantImages', $tenantImages)
            ->with('tenantFiles', $tenantFiles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TenantUpdateRequest $request, $id)
    {
        $tenant = Tenant::findOrFail($id);

        $tenant->update($request->all());

        if($request->tenant_image) {
            foreach ($request->tenant_image as $photo) {

                $filename = Storage::disk('uploads')->put('TenantImages', $photo);

                $tenant->images()->create([
                    'path' => $filename,
                    'imageable_id' => $tenant->id,
                    'imageable_type' => get_class($tenant)
                ]);
            }
        }
        if($request->supporting_files) {
            foreach ($request->supporting_files as $p_files) {

                $filename = Storage::disk('uploads')->put('TenantFiles', $p_files);

                $tenant->files()->create([
                    'path' => $filename,
                    'fileable_id' => $tenant->id,
                    'fileable_type' => get_class($tenant)
                ]);
            }
        }

        if($request->property !== null) {
            Property::where('id', $request->property)
                ->update(['tenant_id' => $tenant->id]);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tenant = Tenant::findOrFail($id);
        $getFilesToDelete = Files::all()->where('fileable_id','=',$id)->where('fileable_type','=','App\Tenant');
        $getImagesToDelete = Image::all()->where('imageable_id','=',$id)->where('imageable_type','=','App\Tenant');

        foreach ($getImagesToDelete as $imageToDelete):
            Storage::disk('uploads')->delete($imageToDelete->path);
            $imageToDelete->delete();
        endforeach;

        foreach ($getFilesToDelete as $fileToDelete):
            Storage::disk('uploads')->delete($fileToDelete->path);
            $fileToDelete->delete();
        endforeach;

        Property::where('tenant_id', $id)
            ->update(['tenant_id' => null]);

        $tenant->delete();
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
