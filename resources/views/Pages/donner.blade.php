@extends('Partials.donner-master')
@section('content')
    <div class="donner-right">
        <div class="donner-buttons">
            <div class="outer-donate-money">
                <div class="pattern-layer"></div>
                <a href="/donate-money"><div class="donate-money pulse"><p>Donate Money</p></div></a>
            </div>
            <a href="/donate-things"><div class="donate-things pulse"><p>Donate Things</p></div></a>
            <a href="/help-patient"><div class="help-patient pulse"><p>Help a Patient</p></div></a>
        </div>
        <div class="recent-problems">
            <div class="panel panel-primary">
                <div class="panel-heading problems"><h1>Recent Problems<span></span></h1></div>
            </div>
        </div>
    </div>
@endsection
