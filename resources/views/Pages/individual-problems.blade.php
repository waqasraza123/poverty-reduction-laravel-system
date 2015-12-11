@include('Partials.donner-master')
@section('content')
@inject("problems", "App\Http\Controllers\DonnerController")
    <div class="panel panel-primary">

        {{--@foreach($problems->updateDashboard() as $problem)
            $problem->count--}}
        {{$problems -> getCurrentUrl()}}

        <div class="panel-heading"></div>
        <div class="panel-body"></div>
    </div>
@endsection