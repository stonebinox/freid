<div class="row">
    @forelse($experts as $e)
        <div class="col-lg-4 col-md-6">
            <div class="card-box widget-user">
                <div>
                    <img src="{{ $e->image }}" class="img-fluid rounded-circle" alt="user">
                    <div class="wid-u-info">
                        <h4 class="m-t-0 m-b-5 font-600">{{ $e->name }}</h4>
                        <p class="text-muted m-b-5 font-13">{{ $e->headline }}</p>
                        <a href="{{ route('view_profile', ['id' => $e->id]) }}"><small class="text-warning"><b>Approach</b></small></a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p>No experts at this moment</p>
    @endforelse
</div><!-- row -->