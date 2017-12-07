@extends('layouts.app')

@section('content')
  <header class="masthead" style="height: 250px;">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                  <div class="post-heading text-center">
                      <h1>Payment History:</h1>
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
                @if (Auth::user()->profile_type != 0)
                  <h2>Payments Received</h2>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Transaction ID</th>
                        <th>Amount</th>
                        <th>Payer</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($payin as $p)
                        <tr>
                          <td>{{ $p->trf_id }}</td>
                          <td>${{ $p->amount }}</td>
                          <td>{{ $p->name }}</td>
                        </tr>
                      @empty
                        <p>No payments received yet!</p>
                      @endforelse
                    </tbody>
                  </table>
                @endif
                <br><hr><br>
                <h2>Payments Made</h2>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Transaction ID</th>
                      <th>Amount</th>
                      <th>Receiver</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($payout as $po)
                        <tr>
                          <td>{{ $po->trf_id }}</td>
                          <td>${{ $po->amount }}</td>
                          <td>{{ $po->name }}</td>
                        </tr>
                      @empty
                        <p>No payments made yet!</p>
                      @endforelse
                  </tbody>
                </table>  
              </div>
          </section>
      </div>
  </div>
@endsection