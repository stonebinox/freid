@extends('layouts.app')

@section('content')
    <header class="masthead" style="height: 250px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="post-heading text-center">
                        <h1>Report {{ $user->name }}</h1>
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
                    <form method="post" action="{{ route('report', ['id' => $user->id]) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="reason">Reason for reporting {{ $user->name }}</label>
                            <textarea class="form-control" id="reason" rows="3" placeholder="Reason" name="reason"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Report {{ $user->name }}</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
