<nav class="navbar sticky-top" id="navbar-top">
    <div class="navleft">
        <div class="sidebar-button">
            <i class="fa fa-navicon"></i>
        </div>
    </div>
    <div class="options-button">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="divimg">
                        <img src="{{ url('/images/avatars/'.Auth::user()->avatar) }}" alt="Avatar" class="avatar">
                    </div>
                    <span class="nickname">{{ Auth::user()->user_username }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-animated" aria-labelledby="navbarDropdownMenuLink">
                    <!--<a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>-->
                    <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Salir
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>