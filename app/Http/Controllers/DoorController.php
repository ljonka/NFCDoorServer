<?php

namespace App\Http\Controllers;

use App\Door;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;

class DoorController extends Controller
{

    use FormBuilderTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('doors.index', ['elements' => Door::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\DoorForm', [
            'method' => 'POST',
            'url' => action('DoorController@store')
        ]);
        return view('doors.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $door = new Door($request->all());
        $door->api_key = $request->user()->createToken($door->name)->accessToken;
        $door->save();
        $request->session()->flash('status', 'Tür \''.$door->name.'\' wurde hinzugefügt.');
        return redirect(action('DoorController@show', $door->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Door  $door
     * @return \Illuminate\Http\Response
     */
    public function show(Door $door)
    {
        return view('doors.show', ['door' => $door]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Door  $door
     * @return \Illuminate\Http\Response
     */
    public function edit(Door $door)
    {
        $form = $this->form('App\Forms\DoorForm', [
            'method' => 'PATCH',
            'url' => action('DoorController@update', $door->id),
            'model' => $door
        ]);
        return view('doors.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Door  $door
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Door $door)
    {
        $door->fill($request->all());
        $door->save();
        $request->session()->flash('status', '\''.$door->name.'\' wurde aktualisiert.');
        return redirect(action('DoorController@show', $door->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Door  $door
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Door $door)
    {
        //$request->session()->flash('status', 'Die Tür \''.$door->name.'\' wurde entfernt.');
        //$door->delete();
        return redirect(action('DoorController@index'));
    }
}
