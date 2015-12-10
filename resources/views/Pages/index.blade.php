@extends('Partials.master')
@section('index-content')
@include('Partials.index-nav')

    <div class="index-banner">
        @include('Partials.index-banner')
    </div>

    <div class="index-buttons-wrapper">
        <a href="/donner"><button type="button" class="btn btn-primary donner">I am a Donor</button></a>
        <a href="/needy"><button type="button" href="/needy" class="btn btn-danger needy">I am a Needy</button></a>
        <!-- Apply any bg-* class to to the info-box to color it -->
    </div>

    <h1 class="problem-stats-heading">Problem stats</h1>

    {{--show problems stats--}}
    <div class="col-lg-12">
        @include('Partials.problem-stats')
    </div>
@endsection