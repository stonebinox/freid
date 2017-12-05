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
                        <h1>Get solutions from experts with Freid</h1>
                        <p>Freid makes it super easy to chat with industry experts about your issues, getting proven solutions in the process.</p>
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
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="card-box widget-user">
                                    <div>
                                        <img src="img/users/1.jpg" class="img-fluid rounded-circle" alt="user">
                                        <div class="wid-u-info">
                                            <h4 class="m-t-0 m-b-5 font-600">Michelle Kate</h4>
                                            <p class="text-muted m-b-5 font-13">www.themashabrand.com</p>
                                            <small class="text-warning"><b>Chat</b></small>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div><!-- row -->
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
                    <a href="#" class="kafe-btn kafe-btn-default"><i class="fa fa-spinner"></i> Read More</a>
                </div>
                <!-- /.col-lg-8 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /container -->
    </section>
    <!-- /w -->
@endsection
