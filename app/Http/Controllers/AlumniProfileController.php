<?php

namespace App\Http\Controllers;

use App\Models\AlumniProfile;
use App\Http\Requests\StoreAlumniProfileRequest;
use App\Http\Requests\UpdateAlumniProfileRequest;

class AlumniProfileController extends Controller
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
     * @param  \App\Http\Requests\StoreAlumniProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlumniProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlumniProfile  $alumniProfile
     * @return \Illuminate\Http\Response
     */
    public function show(AlumniProfile $alumniProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AlumniProfile  $alumniProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(AlumniProfile $alumniProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlumniProfileRequest  $request
     * @param  \App\Models\AlumniProfile  $alumniProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlumniProfileRequest $request, AlumniProfile $alumniProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlumniProfile  $alumniProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlumniProfile $alumniProfile)
    {
        //
    }
}
