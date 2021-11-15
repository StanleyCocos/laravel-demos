<?php

namespace App\Http\Controllers;

use App\Models\Test1Model;
use Illuminate\Http\Request;

class Test10Controller extends Controller
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
        $test = new Test1Model();
        $test -> name = 'test ljc';
        $test -> save();

        return response()->json($test->data());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test1Model  $test1Model
     * @return \Illuminate\Http\Response
     */
    public function show(Test1Model $test1Model)
    {
        //
        return response()->json($test1Model->data());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test1Model  $test1Model
     * @return \Illuminate\Http\Response
     */
    public function edit(Test1Model $test1Model)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test1Model  $test1Model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test1Model $test1Model)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test1Model  $test1Model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test1Model $test1Model)
    {
        //
    }
}
