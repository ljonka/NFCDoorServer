@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Person</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="form-group edit-remove">
                        <a href="{{action('DoorUserController@edit', $doorUser->id)}}"
                          class="btn btn-primary" role="button">bearbeiten</a>

                        {{Form::open(['method'  => 'DELETE', 'action' =>
                          ['DoorUserController@destroy', $doorUser->id]])}}
                          <button type="submit" class="btn btn-danger">entfernen</button>
                        {{Form::close()}}
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">Chip uuid</div>
                      <div class="panel-body">{{$doorUser->chip_uuid}}</div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">Grants</div>
                      <div class="panel-body">
                        <ul>
                        @foreach($grants as $grant)
                          <li>
                            {{$grant->doorModel()->name}}
                          </li>
                        @endforeach
                        </ul>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">Name</div>
                      <div class="panel-body">{{$doorUser->name}}</div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">Telefon</div>
                      <div class="panel-body">{{$doorUser->phone}}</div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">E-Mail</div>
                      <div class="panel-body">{{$doorUser->email}}</div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">note</div>
                      <div class="panel-body">{{$doorUser->note}}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
