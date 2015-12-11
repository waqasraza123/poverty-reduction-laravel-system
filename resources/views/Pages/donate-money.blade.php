@extends('Partials.donner-master')
@section('content')
    <div class="donate-money-form">
        <h1>Please Fill the Form carefully.</h1>
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif

        <div class="alert alert-danger necessary-fields" style="display: none;"></div>

        <form action="/donate-money" method="post" role="form" name="" class="center-form">
            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <div class="form-group">
                <label for="name" class="control-label">Name</label>
                <input type="text" name="name" placeholder="Your Full Name" class="form-control" required value="{{Auth::user()->name}}">
            </div>

            <div class="form-group">
                <label for="organization" class="control-label">Organization</label>
                <input type="text" name="organization" placeholder="Organization Name (if submitting on behalf of an organization or group of people)" class="form-control">
            </div>

            <div class="form-group">
                <label for="email" class="control-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}">
            </div>

            <div class="form-group">
                <label for="address" class="control-label">Address</label>
                <textarea rows="5" name="address" class="form-control">{{Auth::user()->address}}</textarea>
            </div>

            <div class="form-group">
                <label for="city" class="control-label">City</label>
                <input type="text" name="city" class="form-control">
            </div>

            <div class="form-group">
                <label for="state" class="control-label">State/Province</label>
                <input type="text" name="state" class="form-control">
            </div>

            <div class="form-group">
                <label for="phone" class="control-label">Contact Number</label>
                <input type="tel" name="phone" class="form-control" value="{{Auth::user()->phone}}" required>
            </div>

            <h3>Donation Information</h3><br>

            <div class="form-group">
                <label for="amount" class="control-label">Amount (PKR)</label>
                <input type="number" name="amount" class="form-control" required placeholder="must be greater than 50 Rs">
            </div>

            <div class="form-group">
                <input type="submit" class="form-control btn btn-danger donate-money-main" value="Donate">
                <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_scBd22kcCSkuoecQJoMrNSQi"
                        data-amount=""
                        data-name="Do good have Good"
                        data-description="Donation"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                        data-locale="auto">
                </script>
            </div>

        </form>
    </div>
@endsection