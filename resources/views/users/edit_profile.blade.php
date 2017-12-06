@extends('layouts.app')

@section('content')
    <header class="onboarding" style="background-color: #fff !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="post-heading text-center">
                        <h1>Edit Your Profile:</h1>
                        <hr>
                        <br><br><br>
                        <form method="post" action="{{ route('edit_profile') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" class="form-control" id="headline" aria-describedby="headlineHelp" placeholder="Full Name" name="headline" value="{{ $user->name }}">
                                <small id="headlineHelp" class="form-text">Enter your full name</small>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="headline" aria-describedby="headlineHelp" placeholder="Professional headline" name="headline" value="{{ $user->headline }}">
                                <small id="headlineHelp" class="form-text">Enter your professional headline</small>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="descripton" rows="3" placeholder="About You" name="description">{{ $user->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="skills" aria-describedby="skillsHelp" placeholder="Skills" name="skills" value="{{ $user->skills }}">
                                <small id="skillsHelp" class="form-text">Enter skills seperated by commas</small>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Next Step...</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
