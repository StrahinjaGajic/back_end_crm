<?php

namespace App\Http\Controllers;

use App\Country;
use App\Http\Requests\PropertyRequest;
use App\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
