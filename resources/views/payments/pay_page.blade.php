@extends('layouts.app')

@section('content')
    <header class="masthead" style="height: 250px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="post-heading text-center">
                        <h1>Edit Your Profile:</h1>
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
                    <div id="charge-error" class="{{ Session::has('error') ? '' : 'hidden' }}">
                      <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    </div>
                    <form method="post" action="{{ route('pay_page', ['id' => $user->id, 'c_id' => $c_id]) }}" id="payment_form">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <div class="input-group mb-4 mb-sm-0">
                            <div class="input-group-addon">$</div>
                            <input type="number" class="form-control" id="amount" aria-describedby="amountHelp" placeholder="Amount You Wish To Pay" name="amount"><br/>
                          </div>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" id="card-name" aria-describedby="card-nameHelp" placeholder="Name on Card" name="card_name">
                          <small id="card-nameHelp" class="form-text">Enter the name on your card</small>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" id="card-number" aria-describedby="card-numberHelp" placeholder="Card Number" name="card_number">
                          <small id="card-numberHelp" class="form-text">Enter your card number</small>
                        </div>
                        <div class="col-sm-12">
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <input type="text" class="form-control" id="card-expiry-month" aria-describedby="card-expiry-monthHelp" placeholder="Expiry Month" name="card_expiry_month">
                                <small id="card-expiry-monthHelp" class="form-text">Enter your card's expiry month</small>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <input type="text" class="form-control" id="card-expiry-year" aria-describedby="card-expiry-yearHelp" placeholder="Card Expiry Year" name="card_expiry_year">
                                <small id="card-expiry-yearHelp" class="form-text">Enter your card's expiry year</small>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" id="card-cvc" aria-describedby="card-cvcHelp" placeholder="CVC" name="card_cvc">
                          <small id="card-cvcHelp" class="form-text">Enter your card's CVC</small>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-success">Pay!</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('scripts')
  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  <script type="text/javascript" src="{{ asset('js/pay.js') }}"></script>
@endsection