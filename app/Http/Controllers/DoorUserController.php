<?php

namespace App\Http\Controllers;

use App\DoorUser;
use Illuminate\Http\Request;

class DoorUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DoorUser::all();
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
     * @param  \App\DoorUser  $doorUser
     * @return \Illuminate\Http\Response
     */
    public function show(DoorUser $doorUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DoorUser  $doorUser
     * @return \Illuminate\Http\Response
     */
    public function edit(DoorUser $doorUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DoorUser  $doorUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DoorUser $doorUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DoorUser  $doorUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoorUser $doorUser)
    {
        //
    }
}
