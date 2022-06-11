<?php

namespace App\Http\Controllers;

use App\Models\Bts;
use App\Http\Requests\StoreBtsRequest;
use App\Http\Requests\UpdateBtsRequest;

class BtsController extends Controller
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
     * @param  \App\Http\Requests\StoreBtsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBtsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bts  $bts
     * @return \Illuminate\Http\Response
     */
    public function show(Bts $bts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bts  $bts
     * @return \Illuminate\Http\Response
     */
    public function edit(Bts $bts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBtsRequest  $request
     * @param  \App\Models\Bts  $bts
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBtsRequest $request, Bts $bts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bts  $bts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bts $bts)
    {
        //
    }
}
