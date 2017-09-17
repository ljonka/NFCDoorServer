@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tür</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="form-group edit-remove">
                        <a href="{{action('DoorController@edit', $door->id)}}"
                          class="btn btn-primary" role="button">bearbeiten</a>
                          {{--
                        {{Form::open(['method'  => 'DELETE', 'action' =>
                          ['DoorController@destroy', $door->id]])}}
                          <button type="submit" class="btn btn-danger">entfernen</button>
                        {{Form::close()}}
                        --}}
                    </div>

                    <div class="panel panel-default">
                      <div class="panel-heading">Name</div>
                      <div class="panel-body">{{$door->name}}</div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">Beschreibung</div>
                      <div class="panel-body">{{$door->description}}</div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">Zugangsschlüssel</div>
                      <div class="panel-body api-key">{{$door->api_key}}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
