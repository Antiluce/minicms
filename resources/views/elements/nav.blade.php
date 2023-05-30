<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            @if(auth()->check() && auth()->user()->role_id === 1)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
                </li>
            @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pages.index') }}">Pages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('menus.index') }}">Menu</a>
                </li>
       </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            </li>
        </ul>
    </div>
</nav>
