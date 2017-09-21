<?php

namespace App\Http\Controllers;

use App\Door;
use App\DoorUser;
use App\DoorUserGrant;
use App\Log;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Illuminate\Support\Facades\DB;

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
    public function index(Request $request)
    {
        //lookup unassigned uuid's in log
        $logs = DB::table('logs')
            ->select('logs.chip_uuid', 'logs.data', 'logs.created_at')
            ->groupBy('logs.chip_uuid')
            ->latest('logs.created_at')
            ->leftJoin('door_users', 'logs.chip_uuid', '=', 'door_users.chip_uuid')
            ->whereNull('door_users.chip_uuid')
            ->get();

        if ($request->is('api/*')) {
          return [
            'elements' => DoorUser::all(),
            'logs' => $logs
          ];
        }else{
          return view('doorUsers.index', [
            'elements' => DoorUser::all(),
            'logs' => $logs
          ]);
        }
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

      $doors = Door::all();
      $permissions = $request->input('permissions');
      if(is_array($permissions)){
        foreach($doors as $door){
          //check input for each door, if false, nothing given so assume false
          //find grant for user door combi
          $grant = DoorUserGrant::where([
            ['door_user', '=', $person->id],
            ['door', '=', $door->id]
          ])->first();
          if(in_array($door->id, $permissions)){
            if($grant == null){
              DoorUserGrant::create([
                'door_user' => $person->id,
                'door' => $door->id,
                'grants' => '{}'
              ]);
            }
          }
        }
      }

      $request->session()->flash('status', '\''.$person->name.'\' wurde hinzugefügt.');
      return redirect(action('DoorUserController@show', $person->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DoorUser  $doorUser
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DoorUser $doorUser)
    {
        $grants = DoorUserGrant::where('door_user', '=', $doorUser->id)->get();

        if ($request->is('api/*')) {
          return [
            'doorUser' => $doorUser,
            'grants' => $grants
          ];
        }else{
          return view('doorUsers.show', [
            'doorUser' => $doorUser,
            'grants' => $grants
          ]);
        }
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
      ], ['user' => $doorUser]);
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

      $doors = Door::all();
      $permissions = $request->input('permissions');

        foreach($doors as $door){
          //check input for each door, if false, nothing given so assume false
          //find grant for user door combi
          $grant = DoorUserGrant::where([
            ['door_user', '=', $doorUser->id],
            ['door', '=', $door->id]
          ])->first();
          if(is_array($permissions) && in_array($door->id, $permissions)){
            if($grant == null){
              DoorUserGrant::create([
                'door_user' => $doorUser->id,
                'door' => $door->id,
                'grants' => '{}'
              ]);
            }
          }else if($grant !== null){
              $grant->delete();
          }
        }

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
      $grants = DoorUserGrant::where('door_user', '=', $doorUser->id)->get();
      foreach($grants as $grant){
        $grant->delete();
      }
      $doorUser->delete();
      return redirect(action('DoorUserController@index'));
    }
}
