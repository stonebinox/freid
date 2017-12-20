@extends('layouts.app')

@section('content')
    <header class="masthead" style="height: 250px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="post-heading text-center">
                        <h1>Add PayPal Account:</h1>
                        <hr style="background: white;">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="">
            <section class="posts-2 following">
                <div class="container">
                    <form method="post" action="{{ route('paypal') }}" id="payment_form">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <input type="paypal" class="form-control" id="paypal" aria-describedby="paypalHelp" placeholder="PayPal Email" name="paypal" value="{{ ($paypal != NULL) ? $paypal->email : '' }}"><br/>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection