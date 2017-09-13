<?php

namespace App\Http\Controllers;

use App\DoorUserGrant;
use Illuminate\Http\Request;

class DoorUserGrantController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ['elements' => DoorUserGrant::all()];
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
     * @param  \App\DoorUserGrant  $doorUserGrant
     * @return \Illuminate\Http\Response
     */
    public function show(DoorUserGrant $doorUserGrant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DoorUserGrant  $doorUserGrant
     * @return \Illuminate\Http\Response
     */
    public function edit(DoorUserGrant $doorUserGrant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DoorUserGrant  $doorUserGrant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DoorUserGrant $doorUserGrant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DoorUserGrant  $doorUserGrant
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoorUserGrant $doorUserGrant)
    {
        //
    }
}
