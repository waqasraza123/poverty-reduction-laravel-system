@extends('Partials.donner-master')
@section('content')
    <div class="donner-right">
        <div class="recent-problems">
            <div class="panel panel-primary">
                <div class="panel-heading problems"><h2>Recent Problems<span></span></h2></div>
            </div>
        </div>

        <div class="unsolved-problems">
            <div class="panel panel-primary">
                <div class="panel-heading unsolved"><h2>Unsolved Problems<span></span></h2></div>
            </div>
        </div>

        <div class="solved-problems">
            <div class="panel panel-primary">
                <div class="panel-heading solved"><h2>Solved Problems<span></span></h2></div>
            </div>
        </div>
    </div>
@endsection
