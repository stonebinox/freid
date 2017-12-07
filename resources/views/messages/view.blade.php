@extends('layouts.app')

@section('content')
  <header class="masthead" style="height: 250px;">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                  <div class="post-heading text-center">
                    <h1>{{ $conversation->subject }}:</h1>
                    <hr style="background: white;">
                  </div>
              </div>
          </div>
      </div>
  </header>
  <div class="container fill">
    <div class="row chat-wrap">
        <!-- Contacts & Conversations -->
        <div class="col-sm-3 panel-wrap">
            <!--Left Menu / Conversation List-->
            <div class="col-sm-12 section-wrap">
                <!--Header-->
                <div class="row header-wrap">
                    <div class="chat-header col-sm-12">
                    </div>
                </div>
            </div>
        </div>
        <!-- Messages & Info -->
        <div class="col-sm-12 panel-wrap">
            <!--Main Content / Message List-->
            <div class="col-sm-12 section-wrap" id="Messages">
                <!--Header-->
                <div class="row header-wrap">
                    <div class="chat-header col-sm-12">
                        <h4><a href="{{ route('all_conversation') }}"><i class="fa fa-arrow-left"></i> Back</a></h4>
                        <!--<div class="header-button">
                            <a class="btn pull-right info-btn">
                                <i class="fa fa-info-circle fa-lg"></i>
                            </a>
                        </div>-->
                    </div>
                </div>
                <!--Messages-->
                <div class="row content-wrap messages">
                  @forelse($messages as $m)
                    <div class="msg">
                        <div class="media-body">
                            <!--<small class="pull-right time"><i class="fa fa-clock-o"></i> </small>-->
                            <h5 class="media-heading">{{ $m->user->name }}</h5>
                            <small class="col-sm-11">{{ $m->message }}</small>
                        </div>
                    </div>
                  @empty
                  @endforelse
                </div>
                <!--Message box & Send Button-->
                <div class="row send-wrap">
                    <div class="col-sm-12">
                        @if ($conversation->close == 1)
                            <p>Conversation has been marked resolved!</p>
                        @else
                            <form action="{{ route('respond', ['id' => $conversation->id]) }}" method="post">
                                <div class="send-message">
                                    <div class="message-text">
                                        <textarea class="no-resize-bar form-control" rows="2" placeholder="Write a message..."></textarea>
                                    </div>
                                    <div class="send-button">
                                        <button type="submit" class="btn">Send <i class="fa fa-send"></i></button>
                                    </div>
                                    @if ($conversation->user1_id == Auth::user()->id)
                                        <div class="send-button">
                                            <a href="{{ route('close_conversation', ['id' => $conversation->id]) }}" class="btn" style="text-decoration: none; color: #2C3E50;">Resolved? <i class="fa fa-check"></i></a>
                                        </div>
                                    @endif
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <!--Sliding Menu / Conversation Members-->
        </div>
    </div>
</div>
@endsection