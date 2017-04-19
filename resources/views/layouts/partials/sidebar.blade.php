<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Gravatar::get(Auth::user()->email) }}" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>

                <a href="#"><i class="fa fa-circle text-success"></i> {{ Auth::user()->role->name }}
                </a>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <li class="{{ $menu == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class='fa fa-home'></i> <span>Dashboard</span>
                </a>
            </li>

            @if(Auth::user()->role->slug == 'admin' || Auth::user()->role->slug == 'associate')
                <li class="header">Administration</li>

                <li class="{{ $menu == 'admin.users' ? 'active' : '' }}">
                    <a href="{{ route('admin.users.index') }}">
                        <i class='fa fa-users'></i> <span>Users</span>
                    </a>
                </li>

                <li class="{{ $menu == 'admin.courses' ? 'active' : '' }}">
                    <a href="{{ route('admin.courses.index') }}">
                        <i class='fa fa-book'></i> <span>Courses</span>
                    </a>
                </li>

                <li class="{{ $menu == 'admin.sections' ? 'active' : '' }}">
                    <a href="{{ route('admin.sections.index') }}">
                        <i class='fa fa-tags'></i> <span>Sections</span>
                    </a>
                </li>
            @endif

            @if(Auth::user()->role->slug == 'admin' || Auth::user()->role->slug == 'faculty_member')
                <li class="header">Faculty</li>

                <li class="{{ $menu == 'faculty.courses' ? 'active' : '' }}">
                    <a href="{{ route('faculty.courses.index') }}">
                        <i class='fa fa-book'></i> <span>Courses</span>
                    </a>
                </li>

                <li class="{{ $menu == 'faculty.requests' ? 'active' : '' }}">
                    <a href="{{ route('faculty.requests.index') }}">
                        <i class='fa fa-plus'></i> <span>Requests</span>
                    </a>
                </li>
            @endif

            @if(Auth::user()->role->slug == 'admin' || Auth::user()->role->slug == 'registration_office')
                <li class="header">Registrar</li>

                <li class="{{ $menu == 'registrar.settings' ? 'active' : '' }}">
                    <a href="{{ route('registrar.settings') }}">
                        <i class='fa fa-cogs'></i> <span>Settings</span>
                    </a>
                </li>

                <li class="{{ $menu == 'registrar.requests' ? 'active' : '' }}">
                    <a href="{{ route('registrar.requests.index') }}">
                        <i class='fa fa-tags'></i> <span>Requests</span>
                    </a>
                </li>

                <li class="{{ $menu == 'registrar.tentatives' ? 'active' : '' }}">
                    <a href="{{ route('registrar.tentatives') }}">
                        <i class='fa fa-th-list'></i> <span>Schedule tentatives</span>
                    </a>
                </li>

                <li class="{{ $menu == 'registrar.calendar' ? 'active' : '' }}">
                    <a href="{{ route('registrar.calendar') }}">
                        <i class='fa fa-calendar'></i> <span>Calendar</span>
                    </a>
                </li>
            @endif

        </ul>
    </section>

</aside>
