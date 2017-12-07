@extends('layouts.app')

@section('content')
    <header class="masthead" style="height: 250px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="post-heading text-center">
                        <h1>Send Message: </h1>
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
                    <form method="post" action="{{ route('create_conversation', ['id' => $user->id]) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" aria-describedby="subjectHelp" placeholder="Message subject" name="subject" required="required">
                            <small id="subjectHelp" class="form-text">Enter your message's subject</small>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="message" rows="3" placeholder="Your message" name="message" required="required">{{ old('message') }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Send <i class="fa fa-send"></i></button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
