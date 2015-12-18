@extends('Partials.donner-master')
@section('content')
{{--$problems is coming from ViewComposers\ProblemsComposer--}}
    <div class="panel panel-primary">
        <div class="panel-heading"><h2>All Problems</h2></div>
        <div class="panel-body">
            @foreach($allProblems as $problem)
                <div class="well well-lg">
                    @if($problem->user->donner == 0)
                        {{$problem->problem}}
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection