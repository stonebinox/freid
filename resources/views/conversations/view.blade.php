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
                                @forelse($open as $o)
                                  @if ($o->user1_id == Auth::user()->id || $o->user2_id == Auth::user()->id)
                                    @if ($o->user1_id == Auth::user()->id)
                                      <?php $recipient = \App\User::find($o->user2_id); ?>
                                    @else
                                      <?php $recipient = \App\User::find($o->user1_id); ?>
                                    @endif
                                    <h4 style="color:#000;"><a style="text-decoration: none; color: #2C3E50;" href="{{ route('view_conversation', ['id' => $o->id]) }}">=> {{ $recipient->name }} - {{ $o->subject }}</a></h4>
                                  @endif
                                @empty
                                  <p>No messages yet!</p>
                                @endforelse
                                @forelse($closed as $c)
                                  @if ($c->user1_id == Auth::user()->id || $c->user2_id == Auth::user()->id)
                                    @if ($oc->user1_id == Auth::user()->id)
                                      <?php $recipient = \App\User::find($c->user2_id); ?>
                                    @else
                                      <?php $recipient = \App\User::find($c->user1_id); ?>
                                    @endif
                                    <h4 style="color:#000;"><a style="text-decoration: none; color: #2C3E50;" href="{{ route('view_conversation', ['id' => $c->id]) }}">=> {{ $recipient->name }} - {{ $c->subject }}</a></h4>
                                  @endif
                                @empty
                                @endforelse
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
