@extends('Partials.donner-master')
@section('content')
    <div class="donate-things-form">

        <div class="alert alert-success necessary-fields" style="display: none;"></div>

        <form class="" role="form" name="" action="" method="" id="things-form">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="id" value="{{$id}}">

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
                <input type="submit" class="form-control btn btn-danger submit-things" value="Submit Things">
            </div>

        </form>
    </div>
@endsection