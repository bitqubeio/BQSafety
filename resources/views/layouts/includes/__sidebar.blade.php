<div class="sidebar-left">
    <nav role="navigation">
        <div class="sidebar-left-header">
            <a href="#" class="nav-brand"><i class="fa fa-stumbleupon"></i>
                <span class="title">BQSafety</span>
            </a>
            <div class="close-sidebar">
                <i class="fa fa-close"></i>
            </div>
        </div>
        <div class="sidebar-left-avatar">
            <div class="hover-gradient"></div>
            <div class="indexz">
                <div class="divimg">
                    <img src="{{ url('/images/avatars/'.Auth::user()->avatar) }}" alt="Avatar">
                </div>
                <span class="title">{{ Auth::user()->user_username }}</span>
            </div>
        </div>
        <ul>
            <li><a class="{{ Request::is('reportsheet') ? 'active' : null }}" href="{{ url('/reportsheet') }}"><i class="fa fa-folder-open-o"></i> <span class="title">Mis reportes</span></a></li>
            <li><a class="{{ Request::is('reportsheet/create') ? 'active' : null }}" href="{{ url('/reportsheet/create') }}"><i class="fa fa-plus"></i> <span class="title">Nuevo reporte</span></a></li>
            @if(Auth::user()->id == 1)
            <li><a class="{{ Request::is('company*') ? 'active' : null }}" href="{{ url('/company') }}"><i class="fa fa-building-o"></i> <span class="title">Empresas</span></a></li>
            <li><a class="{{ Request::is('location*') ? 'active' : null }}" href="{{ url('/location') }}"><i class="fa fa-map-marker"></i> <span class="title">Ubicaciones</span></a></li>
            <li><a class="{{ Request::is('allreportsheets') ? 'active' : null }}" href="{{ url('allreportsheets') }}"><i class="fa fa-folder-o"></i> <span class="title">Reportes</span></a></li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#menu1" aria-expanded="false" aria-controls="menu1"><i class="fa fa-home"></i> <span class="title">Dropdown</span></a>
                <div class="sidsebar-left-dropdown">
                    <ul class="collapse" id="menu1">
                        <li><a href="#"><i class="fa fa-hdd-o"></i> <span class="title">Dropdown 1</span></a></li>
                        <li><a href="#"><i class="fa fa-qrcode"></i> <span class="title">Dropdown 2</span></a></li>
                        <li><a href="#"><i class="fa fa-outdent"></i> <span class="title">Dropdown 3</span></a></li>
                    </ul>
                </div>
            </li>
            <li><a href="#"><i class="fa fa-cog"></i> <span class="title">Settings</span></a></li>
            @endif
        </ul>
    </nav>
</div>