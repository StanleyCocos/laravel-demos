<?php

namespace App\Http\Controllers;

use App\Models\ImageModel;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = ImageModel::all();
        $data = [];
        foreach($list as $image){
            array_push($data, $image->data());
        }
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $image = new ImageModel();
        $image->name = 'ljc_create';
        $image->save();
        return response()->json($image->data());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = new ImageModel();
        $image->name = 'ljc1';
        $image->save();
        return response()->json($image->data());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImageModel  $imageModel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ImageModel $resources_bind)
    {
        // return $request->all();
        // echo $request->all();
        return response()->json($resources_bind->data());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImageModel  $imageModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageModel $imageModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImageModel  $imageModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageModel $resources_bind)
    {
        //
        return response()->json($resources_bind->data());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImageModel  $imageModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageModel $imageModel)
    {
        //
    }
}
