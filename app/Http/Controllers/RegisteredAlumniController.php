<?php

namespace App\Http\Controllers;

use App\Models\RegisteredAlumni;
use App\Http\Requests\StoreRegisteredAlumniRequest;
use App\Http\Requests\UpdateRegisteredAlumniRequest;

class RegisteredAlumniController extends Controller
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
     * @param  \App\Http\Requests\StoreRegisteredAlumniRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegisteredAlumniRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegisteredAlumni  $registeredAlumni
     * @return \Illuminate\Http\Response
     */
    public function show(RegisteredAlumni $registeredAlumni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegisteredAlumni  $registeredAlumni
     * @return \Illuminate\Http\Response
     */
    public function edit(RegisteredAlumni $registeredAlumni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRegisteredAlumniRequest  $request
     * @param  \App\Models\RegisteredAlumni  $registeredAlumni
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegisteredAlumniRequest $request, RegisteredAlumni $registeredAlumni)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegisteredAlumni  $registeredAlumni
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegisteredAlumni $registeredAlumni)
    {
        //
    }
}
