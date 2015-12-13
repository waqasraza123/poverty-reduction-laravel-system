{{--@inject('problems', 'App\Http\Controllers\DonnerController')--}}
@extends('Partials.donner-master')
@section('content')
    <div class="panel panel-primary">

        <div class="panel-heading individual-problems-panel-heading" style="padding: 0px !important;">
            @foreach($problems as $problem)
                @if($problem->id == $id)
                    <h3> {{$problem->name}} Posted</h3>
                @endif
            @endforeach
        </div>
        <form method="post">

            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="id" value="{{$id}}">

            <p class="form-control panel-body individual-problem-text">
                @foreach($problems as $problem)
                    @if($problem->id == $id)
                        {{$problem->problem}}
                    <br>
                    <br>
                        <span class="text-primary"><i class="fa fa-map-marker"></i> {{$problem->address}}</span>
                        <span class="text-primary"><i class="fa fa-phone"></i> {{$problem->phone}}</span>
                        <span class="text-primary"><i class="fa fa-money"></i> {{$problem->cost}} Rs (estimated cost)</span>
                    @endif
                @endforeach
            </p>

            <div class="individual-problem-buttons panel-body">
                <input type="submit" formaction="/donate-money-req/{{$id}}" class="btn btn-primary" value="Donate Money">
                <input  type="submit" formaction="/donate-things-req/{{$id}}" class="btn btn-danger" value="Donate Things">
            </div>
        </form>

    </div>
@endsection