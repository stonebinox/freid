<nav class="navbar navbar-light navbar-toggleable-sm bg-faded justify-content-between" id="mainNav-2">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar2">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a href="{{ route('welcome') }}" class="navbar-brand mr-0 capitalize"> {{ config('app.name', 'Freid') }}</a>
  <div class="navbar-collapse collapse justify-content-between" id="collapsingNavbar2">
    <div>
      <!--placeholder to evenly space flexbox items and center links-->
    </div>
    <ul class="navbar-nav">
        <!-- Search in right of nav -->
        <li class="nav-item hidden-xs-down">
            <form class="top_search clearfix" action="{{ route('search') }}" method="post">
                <div class="top_search_con">
                    {{ csrf_field() }}
                    <input class="s" placeholder="Software Engineer, Painting, Web Development" type="text" name="s">
                    <span class="top_search_icon"><i class="fa fa-search"></i></span>
                    <input class="top_search_submit" type="submit">
                </div>
            </form>
        </li>
        <!-- Search Ends -->
    </ul>
    <ul class="nav navbar-nav">
      @guest
      <!-- <li class="nav-item"><a href="{{ route('login') }}" class="nav-link white-text">Login</a></li>
      <li class="nav-item"><a href="{{ route('register') }}" class="nav-link white-text">Register</a></li> -->
      <li class="nav-item"><a href="{{ url('auth/facebook') }}" class="nav-link white-text"><i class="fa fa-facebook"></i> Login / Register</a></li>
      @else
        <li class="nav-item dropdown mega-notification">
            <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="true">
                <i class="fa fa-bell-o"></i>
                <span class="label up p-a-0 danger"></span>
            </a>
            <div class="dropdown-menu pull-right w-xl no-bg no-border no-shadow">
                <div class="scrollable">
                    <ul class="list-group list-group-gap m-a-0">
                        <li class="list-group-item dark-white box-shadow-z0 b">
                            <span class="pull-left m-r">
                              <img src="img/users/3.jpg" alt="..." class="w-40 img-circle">
                            </span>
                            <span class="clear block">Use awesome <a href="#" class="text-primary">animate.css</a><br>
                            <small class="text-muted">10 minutes ago</small>
                          </span>
                        </li>
                        <!-- /list-group-item -->
                        <li class="list-group-item dark-white box-shadow-z0 b">
                            <span class="pull-left m-r">
                              <img src="img/users/5.jpg" alt="..." class="w-40 img-circle">
                            </span>
                            <span class="clear block">
                              <a href="#" class="text-primary">Kyle</a> Added you as friend<br>
                              <small class="text-muted">2 hours ago</small>
                            </span>
                        </li>
                        <!-- /list-group-item -->
                        <li class="list-group-item dark-white text-color box-shadow-z0 b">
                            <span class="pull-left m-r">
                              <img src="img/users/4.jpg" alt="..." class="w-40 img-circle">
                            </span>
                            <span class="clear block">
                              <a href="#" class="text-primary">Jonathan</a> sent you a message<br>
                              <small class="text-muted">1 day ago</small>
                            </span>
                        </li>
                        <!-- /list-group-item -->
                    </ul>
                    <!-- /list-group -->
                </div>
                <!-- /scrollable -->
            </div>
            <!-- /dropdown-menu -->
        </li>
        <!-- /navbar-item -->
        <li class="nav-item dropdown mega-avatar">
            <a class="nav-link dropdown-toggle clear" data-toggle="dropdown" aria-expanded="true">
                <span class="avatar w-32"><img src="img/users/2.jpg" class="w-full rounded" width="25" height="25" alt="..."></span>
                <i class="mini"></i>
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">
                  Alex Grantte
                </span>
            </a>
            <div class="dropdown-menu w dropdown-menu-scale pull-right">
                <a class="dropdown-item" href="#"><span>New Story</span></a>
                <a class="dropdown-item" href="#"><span>Become a Member</span></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="profile.html"><span>Profile</span></a>
                <a class="dropdown-item" href="#"><span>Settings</span></a>
                <a class="dropdown-item" href="#">Need help?</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item"  href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Sign out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
        <!-- /navbar-item -->
      @endguest
    </ul>
    <!-- /navbar-nav -->
  </div>
  <!-- /navbar-collapse -->
</nav>