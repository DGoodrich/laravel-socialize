<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">Socialize</a>

        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            @if (!Auth::guest())
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ url('/admin') }}">
                            <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/user') }}">
                            <i class="fa fa-users" aria-hidden="true"></i> Users
                        </a>
                    </li>
                </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                    <li>
                        <a href="{{ url('/user/'.Auth::user()->username.'/requests') }}">
                            @if($requests > 0)
                                <i class="fa fa-bell faa-ring animated" style="color: goldenrod"></i> Requests
                            @else
                                <i class="fa fa-bell"></i> Requests
                            @endif
                        </a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/user/'.Auth::user()->username) }}"><i class="fa fa-btn fa-user"></i>My Profile</a></li>
                            <li><a href="{{ url('/user/'.Auth::user()->username.'/edit') }}"><i class="fa fa-btn fa-cogs"></i>Settings</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>