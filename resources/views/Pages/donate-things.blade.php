@extends('Partials.donner-master')
@section('content')
    <div class="donate-things-form">
        <form class="" role="form" name="" action="" method="">
            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <div class="form-group">
                <label for="name" class="control-label">Name</label>
                <input type="text" name="name" placeholder="Your Full Name" class="form-control" required value="{{Auth::user()->name}}">
            </div>

            <div class="form-group">
                <label for="address" class="control-label">Location of things</label>
                <input type="text" name="address" class="form-control" required value="{{Auth::user()->address}}">
            </div>

            <div class="form-group">
                <label for="description" class="control-label">Description of things</label>
                <textarea rows="5" name="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="quantity" class="control-label">Quantity of things</label>
                <input type="text" name="quantity" class="form-control" required placeholder="5kg sugar or a bag of cement">
            </div>

            <div class="form-group">
                <input type="submit" class="form-control btn btn-danger" value="Submit Things">
            </div>

        </form>
    </div>
@endsection