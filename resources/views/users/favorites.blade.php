@extends('layouts.app')

@section('content')
<!-- ==============================================
	 Header
	 =============================================== -->
     <header class="masthead" style="">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="post-heading text-center">
                        <h1>Saved Experts</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
<!-- ==============================================
     Posts Section
     =============================================== -->
    <div class="container">
        <div class="mt-110">
            <section class="posts-2 following">
                <div class="container">
                    <div class="card-deck-wrapper">
                        @include('includes.experts')
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- ==============================================
	 More Section
	 =============================================== -->
    <section class="more" style="background: #f2f2f2 !important; padding-top: 10px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-md-2">
                    {{ $experts->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
