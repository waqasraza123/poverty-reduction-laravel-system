{{--@inject('currentProblem', 'App\Http\Controllers\ProblemController')--}}
@extends('Partials.donner-master')
@section('content')

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif



    <div class="panel panel-primary">

        <div class="panel-heading individual-problems-panel-heading" style="padding: 0px !important;">
            @foreach($allProblems as $problem)
                @if($problem->id == $id)
                    <h3> {{$problem->name}} Posted</h3>
                @endif
            @endforeach
        </div>
        <form method="post">

            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="id" value="{{$id}}">

            <p class="form-control panel-body individual-problem-text">
                @foreach($allProblems as $problem)
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

                {{--if user is needy attach completed and cancel button--}}
                @if(Auth::check())
                    @if(Auth::user()->donner == 0)

                        @foreach($allProblems as $problem)
                            @if($problem->id == $id && $problem->solved == 0)
                                <input type="submit" formaction="/problems/{{$id}}/solved" class="btn btn-success" value="Mark as Completed" name="solved">
                            @endif

                            @if($problem->id == $id && $problem->solved == 1)
                                <button type="button" class="btn btn-success" disabled>Mark as Completed</button>
                            @endif
                        @endforeach


                        <input  type="submit" formaction="/problems/{{$id}}/cancel" class="btn btn-danger" value="Cancel">

                    @else

                        <input type="submit" formaction="/donate-money-req/{{$id}}" class="btn btn-primary" value="Donate Money">
                        <input  type="submit" formaction="/donate-things-req/{{$id}}" class="btn btn-danger" value="Donate Things">

                    @endif
                @endif

            </div>
        </form>

    </div>
@endsection