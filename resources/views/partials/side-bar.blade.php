<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{route('index')}}" class="nav-link {{(request()->is('/')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item  {{(request()->is('companies*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{(request()->is('companies*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-building"></i>
                <p>
                    Company
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview ">
                <li class="nav-item">
                    <a href="{{route('companies.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create Company</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('companies.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List Companies</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item {{(request()->is('employees*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{(request()->is('employees*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-person-booth"></i>
                <p>
                    Employees
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('employees.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create Employees</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('employees.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List Employees</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="{{route('task')}}" class="nav-link {{(request()->is('todo*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-list"></i>
                <p>
                    Create ToDo

                </p>
            </a>
        </li>

    </ul>
</nav>
