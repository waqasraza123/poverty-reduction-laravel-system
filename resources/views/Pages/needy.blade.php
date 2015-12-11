@extends('Partials.master')
@include('Partials.index-nav')
@section('index-content')
    <div class="needy-form col-lg-6" style="margin: 70px auto; float: none;">

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="panel panel-primary">
            <div class="panel-heading"><h2>Fill the Form</h2>All Fields are required.</div>
            <div class="panel-body">
                <form action="/needy" method="post" name="" class="" rele="form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="form-group">
                        <label for="name" class="control-label">Name</label>
                        <input type="text" name="name" placeholder="Your Full Name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="control-label">Your Contact Number</label>
                        <input type="tel" name="phone" placeholder="0333-1234567" class="form-control" required min="12">
                    </div>

                    <div class="form-group">
                        <label for="address" class="control-label">Address</label>
                        <input type="text" name="address" placeholder="Your complete address here" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="problem" class="control-label">Problem Detail</label>
                        <textarea rows="5" name="problem" placeholder="Please describe your complete problem here" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="severity" class="control-label">Severity of Problem</label>
                        <select class="form-control" name="severity" required>
                            <option value="extreme">Extreme(very urgent)</option>
                            <option value="high">High(less urgent)</option>
                            <option value="low">Low</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cost" class="control-label">Cost(Rs)</label>
                        <input type="number" name="cost" placeholder="estimated cost" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="submit-needy-form" class="form-control btn btn-danger" >Submit Problem</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection