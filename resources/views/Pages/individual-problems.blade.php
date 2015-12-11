{{--@inject('problems', 'App\Http\Controllers\DonnerController')--}}
@extends('Partials.donner-master')
@section('content')
    <div class="panel panel-primary">

        <div class="panel-heading">
            @foreach($problems as $problem)
                @if($problem->id == $id)
                    <h1>{{$problem->name}} Posted</h1>
                @endif
            @endforeach
        </div>

        <div class="panel-body">
            @foreach($problems as $problem)
                @if($problem->id == $id)
                    {{$problem->problem}}
                @endif
            @endforeach
        </div>

    </div>
@endsection