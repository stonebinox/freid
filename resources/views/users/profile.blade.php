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
                  <a href="{{ route('create_conversation', ['id' => $user->id]) }}">
                    <button type="button" class="btn btn-success waves-effect waves-light">
                      <i class="fa fa-user m-r-5"></i> Approach
                    </button>
                  </a><br/>
                  <a href="{{ route('save_expert', ['id' => $user->id]) }}"><p class="text-warning"><b>save expert</b></p></a>
                  <a href="{{ route('report', ['id' => $user->id]) }}"><small class="text-warning"><b><i class="fa fa-exclamation-triangle"></i>report expert</b></small></a>
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
          <a href="{{ route('create_conversation', ['id' => $user->id]) }}" class="kafe-btn kafe-btn-default"> Approach</a>
        </div><!-- /.col-lg-8 -->
      </div><!-- /.row -->
    </div><!-- /container -->
  </section><!-- /w -->


  <!-- REVIEWS -->
  <section class="entry-content">
    <div class="container">
      <h3 class="title">Reviews</h3>
      <hr>
      <div class="profile-user-box">
        <div class="row">
        @forelse($reviews as $r)
          <div class="col-sm-12">
            <span class="pull-left m-r-15"><img src="{{ $r->user->image }}" alt="" class="thumb-lg img-circle"></span>
            <div class="media-body">
              <h4 class="m-t-5 m-b-5 ellipsis">{{ $r->user->name }}</h4>
              <p class="font-13">{{ $r->review }}</p>
            </div><!-- /media-body -->
          </div><!-- /col-sm-6 -->
        @empty
        @endforelse
        </div><!-- /row -->
      </div><!--/ profile-user-box -->
    </div><!-- /container -->
  </section><!-- /entry-content -->	
@endsection
@section('scripts')
<script type="text/javascript">
  #add").click(function() {
$.ajax({
type: 'get',
url: '#',
data: {
'_token': $('input[name=_token]').val(),
'name': $('input[name=name]').val()
},
success: function(data) {
if ((data.errors)) {
$('.error').removeClass('hidden');
$('.error').text(data.errors.name);
} else {
$('.error').remove();
$('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
}
},
});
$('#name').val('');
});
</script>
@endsection