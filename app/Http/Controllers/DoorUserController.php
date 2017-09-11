<?php

namespace App\Http\Controllers;

use App\DoorUser;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;

class DoorUserController extends Controller
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
    public function index()
    {
        return view('doorUsers.index', ['elements' => DoorUser::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\DoorUserForm', [
            'method' => 'POST',
            'url' => action('DoorUserController@store')
        ]);
        return view('doorUsers.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $person = new DoorUser($request->all());
      $person->save();
      $request->session()->flash('status', '\''.$person->name.'\' wurde hinzugefügt.');
      return redirect(action('DoorUserController@show', $person->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DoorUser  $doorUser
     * @return \Illuminate\Http\Response
     */
    public function show(DoorUser $doorUser)
    {
        return view('doorUsers.show', ['doorUser' => $doorUser]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DoorUser  $doorUser
     * @return \Illuminate\Http\Response
     */
    public function edit(DoorUser $doorUser)
    {
      $form = $this->form('App\Forms\DoorUserForm', [
          'method' => 'PATCH',
          'url' => action('DoorUserController@update', $doorUser->id),
          'model' => $doorUser
      ]);
      return view('doorUsers.edit', compact('form'));
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
      $doorUser->fill($request->all());
      $doorUser->save();
      $request->session()->flash('status', '\''.$doorUser->name.'\' wurde aktualisiert.');
      return redirect(action('DoorUserController@show', $doorUser->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DoorUser  $doorUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, DoorUser $doorUser)
    {
      $request->session()->flash('status', '\''.$doorUser->name.'\' wurde entfernt.');
      $doorUser->delete();
      return redirect(action('DoorUserController@index'));
    }
}
