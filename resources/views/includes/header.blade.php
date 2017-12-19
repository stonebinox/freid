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
        <li class="nav-item"><a href="{{ url('auth/facebook') }}" class="nav-link white-text"><i class="fa fa-facebook"></i> Login / Register</a></li>
      @else
        <li class="nav-item dropdown mega-notification">
            <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="true">
                <i class="fa fa-bell-o"></i>
                <?php $notifications = get_user_notification(); ?>
                @if ($notifications->count() != 0)
                    <span class="label up p-a-0 danger"></span>
                @endif
            </a>
            <div class="dropdown-menu pull-right w-xl no-bg no-border no-shadow">
                <div class="scrollable">
                    <ul class="list-group list-group-gap m-a-0">
                        @forelse ($notifications as $n)
                            <li class="list-group-item dark-white box-shadow-z0 b">
                                <span class="clear block">
                                    @if ($n->amount != null)
                                        <a href="{{ route('to_conversation', ['id' => $n->conversation_id, 'n_id' => $n->id]) }}" class="text-primary">{{ $n->user->name }} paid you ${{ $n->user->amount }}</a>
                                    @else
                                        <a href="{{ route('to_conversation', ['id' => $n->conversation_id, 'n_id' => $n->id]) }}" class="text-primary">{{ $n->user->name }} sent you a message</a>
                                    @endif
                                </span>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>
        </li>
        <li class="nav-item dropdown mega-avatar">
            <a class="nav-link dropdown-toggle clear" data-toggle="dropdown" aria-expanded="true">
                <span class="avatar w-32"><img src="{{ Auth::user()->image }}" class="w-full rounded" width="25" height="25" alt="..."></span>
                <!--<i class="mini"></i>-->
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">
                  {{ Auth::user()->name }}
                </span>
            </a>
            <div class="dropdown-menu w dropdown-menu-scale pull-right">
                @if (Auth::user()->profile_type == 1)
                    <a class="dropdown-item" href="#"><span>Balance: ${{ (Auth::user()->balance->balance != NULL) ? Auth::user()->balance->balance : 0 }}</span></a>
                @endif
                <a class="dropdown-item" href="{{ route('all_conversation') }}"><span>Messages</span></a>
                <a class="dropdown-item" href="{{ route('edit_profile') }}"><span>Edit Account</span></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('favorites') }}"><span>Saved Experts</span></a>
                @if (Auth::user()->profile_type == 1)
                    <a class="dropdown-item" href="{{ route('paypal') }}"><span>Payment Method</span></a>
                    <a class="dropdown-item" href="{{ route('make_withdrawal') }}"><span>Request Withdrawal</span></a>
                @else
                    <a class="dropdown-item" href="{{ route('become_expert') }}"><span>Become an Expert</span></a>
                @endif
                <a class="dropdown-item" href="{{ route('pay_history') }}">Payment History</a>
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