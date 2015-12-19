@extends('Partials.donner-master')
@section('content')
{{--$problems is coming from ViewComposers\ProblemsComposer--}}
    <div class="panel panel-primary">
        <div class="panel-heading"><h2>All Problems</h2></div>
        <div class="panel-body">
            @foreach(Auth::user()->problems as $problem)

                <div class="well well-lg">
                    <a href="/problems/{{$problem->id}}">{{$problem->problem}}</a>
                </div>

            @endforeach
        </div>
    </div>
@endsection