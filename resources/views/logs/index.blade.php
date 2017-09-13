@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Aktivitäten</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="list-group">
                      @foreach($elements as $element)
                      <div class="list-group-item">
                        {{--
                        @php
                          $arrData = json_decode($element->data)
                        @endphp
                        <ul>
                          <li><b>Timestamp: </b> {{$element->created_at}}</li>
                        @foreach($arrData as $key => $val)
                          <li><b>{{$key}}: </b>{{$val}}</li>
                        @endforeach
                        </ul>
                        --}}
                        {{$element->data}}
                      </div>
                      @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
