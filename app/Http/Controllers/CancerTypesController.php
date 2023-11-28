<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCancerTypesRequest;
use App\Http\Requests\UpdateCancerTypesRequest;
use App\Models\CancerTypes;

class CancerTypesController extends Controller
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
     * @param  \App\Http\Requests\StoreCancerTypesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCancerTypesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CancerTypes  $cancerTypes
     * @return \Illuminate\Http\Response
     */
    public function show(CancerTypes $cancerTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CancerTypes  $cancerTypes
     * @return \Illuminate\Http\Response
     */
    public function edit(CancerTypes $cancerTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCancerTypesRequest  $request
     * @param  \App\Models\CancerTypes  $cancerTypes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCancerTypesRequest $request, CancerTypes $cancerTypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CancerTypes  $cancerTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(CancerTypes $cancerTypes)
    {
        //
    }
}
