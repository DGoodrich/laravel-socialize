<strong><i class="glyphicon glyphicon-wrench"></i> Tools</strong>

<hr>

<ul class="list-unstyled">
    <li class="nav-header">
        <a data-toggle="collapse" data-target="#userMenu">
            <h5>Settings <i class="glyphicon glyphicon-chevron-down"></i></h5>
        </a>
        <ul class="list-unstyled collapse in" id="userMenu">
            <li class="active"> <a href="{{ url('/user/'. $user->username) }}"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
            <li><a href="{{ url('/user/'. $user->username.'/edit') }}"><i class="glyphicon glyphicon-cog"></i> My Settings</a></li>
            <li><a href="{{ url('/admin/admin') }}"><i class="fa fa-users" aria-hidden="true"></i> Admin Users</a></li>
            <li><a href="{{ url('/admin/users/ban') }}"><i class="glyphicon glyphicon-ban-circle"></i> Ban Users</a></li>
            <li><a href="{{ url('/logout') }}"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
        </ul>
    </li>

    <li class="nav-header">
        <a data-toggle="collapse" data-target="#menu2">
            <h5>Reports <i class="glyphicon glyphicon-chevron-right"></i></h5>
        </a>

        <ul class="list-unstyled collapse" id="menu2">
            <li><a href="#"><del>Information &amp; Stats</del></a></li>
            <li><a href="#"><del>Views</del></a></li>
            <li><a href="#"><del>Requests</del></a></li>
            <li><a href="#"><del>Timetable</del></a></li>
            <li><a href="#"><del>Alerts</del></a></li>
        </ul>
    </li>
</ul>

<hr>

<strong><i class="glyphicon glyphicon-link"></i> Resources</strong>

<hr>

<ul class="nav nav-pills nav-stacked">
    <li class="nav-header"></li>
    <li><a href="{{ url('user/create') }}"><i class="glyphicon glyphicon-list"></i> Create New User</a></li>
    <li><a href="#quick-post"><i class="glyphicon glyphicon-link"></i> New Post</a></li>
    <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i> <del>Reports</del></a></li>
    <li><a href="{{ url('https://clustrmaps.com/site/18m53?utm_source=widget&utm_campaign=widget_ctr') }}" target="_blank"><i class="glyphicon glyphicon-book"></i> Visitor Plugin</a></li>
</ul>