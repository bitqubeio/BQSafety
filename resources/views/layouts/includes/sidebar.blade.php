<div class="sidebar-left">
    <nav role="navigation">
        <div class="sidebar-left-header">
            <a href="{{ url('/') }}" class="nav-brand"><i class="fa fa-stumbleupon"></i>
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
            @permission('my-reportsheet-list')
            <li><a class="{{ Request::is('reportsheet') ? 'active' : null }}" href="{{ url('/reportsheet') }}"><i class="fa fa-folder-open"></i> <span class="title">Mis reportes</span></a></li>
            @endpermission
            @permission('my-reportsheet-create')
            <li><a class="{{ Request::is('reportsheet/create') ? 'active' : null }}" href="{{ url('/reportsheet/create') }}"><i class="fa fa-plus"></i> <span class="title">Nuevo reporte</span></a></li>
            @endpermission
            @permission('company-list')
            <li><a class="{{ Request::is('company*') ? 'active' : null }}" href="{{ url('/company') }}"><i class="fa fa-building"></i> <span class="title">Empresas</span></a></li>
            @endpermission
            @permission('location-list')
            <li><a class="{{ Request::is('location*') ? 'active' : null }}" href="{{ url('/location') }}"><i class="fa fa-map-marker"></i> <span class="title">Ubicaciones</span></a></li>
            @endpermission
            @permission('reportsheet-list')
            <li><a class="{{ Request::is('reportsheets*') ? 'active' : null }}" href="{{ url('reportsheets') }}"><i class="fa fa-folder"></i> <span class="title">Reportes</span></a></li>
            @endpermission
            @permission(['role-list','users-list'])
            <li>
                <a class="{{ Request::is('users*','roles*') ? 'active' : null }}" href="#" data-toggle="collapse" data-target="#menu1" aria-expanded="false" aria-controls="menu1"><i class="fa fa-user-o"></i> <span class="title">Usuarios</span></a>
                <div class="sidsebar-left-dropdown">
                    <ul class="collapse" id="menu1">
                        @permission('users-list')
                        <li><a href="{{ url('users')  }}"><i class="fa fa-users"></i> <span class="title">Todos los usuarios</span></a></li>
                        @endpermission
                        @permission('role-list')
                        <li><a href="{{ url('roles') }}"><i class="fa fa-vcard-o"></i> <span class="title">Roles</span></a></li>
                        @endpermission
                    </ul>
                </div>
            </li>
            @endpermission
        </ul>
    </nav>
</div>