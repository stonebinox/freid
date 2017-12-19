@extends('layouts.app')

@section('content')
    <header class="masthead" style="height: 250px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="post-heading text-center">
                        <h1>Messages:</h1>
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
                    <div class="row">
                      <div class="col-md-12">
                        <div class="featured-developers module">
                          <div class="content">
                            <div class="dev-list">
                              <div class="dev-list-item verified">
                                <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th>Name</th>
                                      <th>Subject</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @forelse($open as $o)
                                      @if ($o->user1_id == Auth::user()->id || $o->user2_id == Auth::user()->id)
                                        @if ($o->user1_id == Auth::user()->id)
                                          <?php $recipient = \App\User::find($o->user2_id); ?>
                                        @else
                                          <?php $recipient = \App\User::find($o->user1_id); ?>
                                        @endif
                                        <tr>
                                          <td><a style="text-decoration: none; color: #818B8D !important;" href="{{ route('view_profile', ['id' => $recipient->id]) }}">{{ $recipient->name }}</a></td>
                                          <td><a style="text-decoration: none; color: #2C3E50;" href="{{ route('view_conversation', ['id' => $o->id]) }}">{{ $o->subject }}</a></td>
                                        </tr>
                                      @endif                            
                                      @empty
                                      @endforelse
                                      @forelse($closed as $c)
                                        @if ($c->user1_id == Auth::user()->id || $c->user2_id == Auth::user()->id)
                                          @if ($c->user1_id == Auth::user()->id)
                                            <?php $recipient = \App\User::find($c->user2_id); ?>
                                          @else
                                            <?php $recipient = \App\User::find($c->user1_id); ?>
                                          @endif
                                          <tr>
                                            <td><a style="text-decoration: none; color: #818B8D !important;" href="{{ route('view_profile', ['id' => $recipient->id]) }}">{{ $recipient->name }}</a></td>
                                            <td><a style="text-decoration: none; color: #2C3E50;" href="{{ route('view_conversation', ['id' => $c->id]) }}">{{ $c->subject }}</a></td>
                                          </tr>
                                        @endif
                                      @empty
                                      @endforelse
                                      @if ($open == NULL && $closed == NULL)
                                        <p>No messages yet!</p>
                                      @endif                                   
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
