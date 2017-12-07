@extends('layouts.app')

@section('content')
  <header class="masthead" style="height: 250px;">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                  <div class="post-heading text-center">
                      <h1>Withdrawals:</h1>
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
                <h2>Request Withdrawal</h2>
                <form action="{{ route('make_withdrawal') }}" method="post">
                  <div class="form-group">
                      <input type="number" class="form-control" id="amount" aria-describedby="amountHelp" placeholder="Amount" name="amount">
                      <small id="amountHelp" class="form-text">Enter amount you wish to withdraw</small>
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-success">Request</button>
                  </div>
                </form>
                <br><hr><br>                
                <h2>Completed Withdrawals</h2>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Amount</th>
                      <th>Balance</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($uncompleted as $u)
                      <tr>
                        <td>{{ $u->user->name }}</td>
                        <td>${{ $u->amount }}</td>
                        <td>${{ $u->user->balance->balance }}</td>                 
                      </tr>
                    @empty
                      <p>No payments received yet!</p>
                    @endforelse
                  </tbody>
                </table>
                <br><hr><br>
                <h2>Completed Withdrawals</h2>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Amount</th>
                      <th>Balance</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($completed as $c)
                        <tr>
                          <td>{{ $c->user->name }}</td>
                          <td>${{ $c->amount }}</td>
                          <td>${{ $c->user->balance->balance }}</td>
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