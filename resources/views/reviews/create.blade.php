@extends('layouts.app')

@section('content')
    <header class="masthead" style="height: 250px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="post-heading text-center">
                        <h1>Review for {{ $user->name }}</h1>
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
                    <form method="post" action="{{ route('create_review', ['id' => $user->id]) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="reason">How was your experience with {{ $user->name }}?</label>
                            <textarea class="form-control" id="review" rows="3" placeholder="Review" name="review"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{ route('welcome') }}" class="btn btn-warning">Skip</a>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
