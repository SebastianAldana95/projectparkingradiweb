<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                <i class="fa fa-home"></i>
                <p>Inicio</p>
            </a>
        </li>
        <li class="nav-item menu-open">
            <a href="#" class="nav-link {{ request()->is('admin/vehicles*') ? 'active' : '' }}">
                <i class="fa fa-car"></i>
                <p>
                    Vehiculos
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.vehicles.index') }}" class="nav-link {{ request()->is('admin/vehicles') ? 'active' : '' }}">
                        <i class="fa fa-eye nav-icon"></i>
                        <p>Ver todos los vehiculos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.vehicles.create') }}" class="nav-link {{ request()->is('admin/vehicles/create') ? 'active' : '' }}">
                        <i class="fa fa-plus-circle nav-icon"></i>
                        <p>Crear vehiculo</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item menu-open">
            <a href="#" class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                <i class="fa fa-users"></i>
                <p>
                    Usuarios
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
                        <i class="fa fa-eye nav-icon"></i>
                        <p>Ver todos los usuarios</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.create') }}" class="nav-link {{ request()->is('admin/users/create') ? 'active' : '' }}">
                        <i class="fa fa-plus-circle nav-icon"></i>
                        <p>Crear usuarios</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Funcionalidad
                    <span class="right badge badge-danger">New</span>
                </p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
