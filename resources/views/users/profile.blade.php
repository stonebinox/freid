@extends('layouts.app')

@section('content')
  <header class="profile-3" style="height: 200px;">
  </header><!-- /header -->
  <!-- ==============================================
	 Header Avatar
	 =============================================== -->	 
    <!--<div class="header-avatar">
				<img alt="" src="" class="avatar avatar-200 photo" width="200" height="200">
				<p>Skills: </p>
		</div>-->	
    <section class="user-section">	 
      <div class="container">
        <div class="profile-user-box">
          <div class="row">
            <div class="col-sm-6">
              <span class="pull-left m-r-15"><img src="{{ $user->image }}" alt="" class="thumb-lg img-circle"></span>
              <div class="media-body">
                <h4 class="m-t-5 m-b-5 ellipsis">{{ $user->name }}</h4>
                <p class="font-13">{{ $user->headline }}</p>
                <p class="text-muted m-b-0"><small>{{ $user->skills }}</small></p>
              </div><!-- /media-body -->
            </div><!-- /col-sm-6 -->
            <div class="col-sm-6">
              <div class="text-right">
                @if (Auth::check() && Auth::user()->id == $user->id)
                  <a href="{{ route('edit_profile') }}">
                    <button type="button" class="btn btn-success waves-effect waves-light">
                      <i class="fa fa-user m-r-5"></i> Edit Profile
                    </button>
                  </a>
                @else
                  <button type="button" class="btn btn-success waves-effect waves-light">
                    <i class="fa fa-user m-r-5"></i> Approach
                  </button>
                @endif
              </div><!-- /text-right -->
            </div><!-- /col-sm-6 -->
          </div><!-- /row -->
        </div><!--/ profile-user-box -->
      </div><!-- /container -->
	 </section><!-- /section --> 

  <!-- ==============================================
	 Entry Content
	 =============================================== -->	 
  <section class="entry-content">
    <div class="container">
      <h3 class="title">About me</h3>
      <h5 class="description">{{ $user->description }}</h5>
    </div><!-- /container -->
  </section><!-- /entry-content -->	

  <section class="more" style="background: #f2f2f2 !important; padding-top: 10px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-md-2">
          <a href="#" class="kafe-btn kafe-btn-default"> Approach</a>
        </div><!-- /.col-lg-8 -->
      </div><!-- /.row -->
    </div><!-- /container -->
  </section><!-- /w -->
@endsection