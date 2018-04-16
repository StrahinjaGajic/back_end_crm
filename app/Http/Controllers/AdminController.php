<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Http\Requests\TenantRequest;
use App\Image;
use App\PropertyFiles;
use App\PropertyImages;
use App\Tenant;
use Illuminate\Http\Request;
use App\Property;
use App\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.home');
    }

    public function tenantList() {
        return view('pages.admin.tenant_list');
    }
    public function addTenant() {

        $countries = Country::all();

        $properties = Property::all('id','property_name')->where('tenant_id','==','')->toArray();

        return view('pages.admin.add_tenant')->with('countries',$countries)->with('properties', $properties);
    }
    public function displayProperty() {

        $countries = Country::all();

        return view('pages.admin.add_property')->with('countries',$countries);
    }

    public function saveProperty(PropertyRequest $request)
    {
        $product = Property::create($request->all());

        foreach ($request->photos as $photo) {

            $filename = $photo->store('PropertyPhotos'); //parametar je ime foldera u kom ce stojati slike

            $product->images()->create([
                'path' => $filename,
                'imageable_id' => $product->id,
                'imageable_type' => get_class($product)
            ]);
        }
        foreach ($request->property_files as $p_files) {

            $filename = $p_files->store('PropertyFiles');

            $product->files()->create([
                'path' => $filename,
                'fileable_id' => $product->id,
                'fileable_type' => get_class($product)
            ]);
        }
        Redirect::to(route('admin.tenant-list'))->with('message', 'You have successfully created an property');

    }

    public function saveTenant(TenantRequest $request)
    {
        $tenant = Tenant::create($request->all());

        foreach ($request->tenant_image as $photo) {

            $filename = $photo->store('TenantPhotos'); //parametar je ime foldera u kom ce stojati slike

            $tenant->images()->create([
                'path' => $filename,
                'imageable_id' => $tenant->id,
                'imageable_type' => get_class($tenant)
            ]);
        }
        foreach ($request->supporting_files as $p_files) {

            $filename = $p_files->store('TenantFiles');

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

        Redirect::to(route('admin.tenant-list'))->with('message', 'You have successfully created an tenant');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
